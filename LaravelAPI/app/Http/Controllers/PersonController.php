<?php

namespace App\Http\Controllers;

use App\Models\Persons;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{

    // function to refresh the database
    public function refresh(): JsonResponse
    {
        // Refresh the database
        Artisan::call('migrate:refresh');

        return response()->json(['message' => 'Database refreshed successfully'], 200);
    }
    public function index(): JsonResponse
    {
        //$Person = Persons::all();

        return response()->json(['message' => 'Viewing all users is disabled, please search by name/id to view a specific user.'], 200);
    }

    public function store(Request $request): JsonResponse
    {
        // Validate the person data
        $validate = validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s]+$/u|max:255|unique:persons',
        ]);


        // if validation is successful, create the person
        if ($validate->fails()) {
            $errors = $validate->errors();
            return response()->json([$errors], 400);
        }
            // Create the person record
            $person = Persons::create([
                'name' => $request->input('name'),
            ]);

            // You may also add other logic here, such as sending an email confirmation to the customer, etc.

            return response()->json(['message' => 'Person created successfully', 'Person' => $person], 201);

    }

    // Retrieve details of a specific person by ID
    public function showByName(Request $request): JsonResponse
    {
        // Validate the person data
        $validate = validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s]+$/u|max:255',
        ]);

        if ($validate->fails()) {
            $errors = $validate->errors();
            return response()->json([$errors], 400);
        }

        $name = $request->input('name');

        $person = Persons::where('name', $name)->first();

        if (!$person) {
            return response()->json(['Message' => 'Name not found'], 404);
        }

        return response()->json(['data' => $person], 200);
    }

    // Retrieve details of a specific person by ID
    public function showById($id): JsonResponse
    {
        $person = Persons::find($id);

        if (!$person) {
            return response()->json(['Message' => 'ID not found'], 404);
        }

        return response()->json(['data' => $person], 200);
    }

    /**
     * Get person details by ID.
     *
     * @param Request $request
     * @param int $id The ID of the person to retrieve.
     * @return JsonResponse
     */
    public function editById(int $id, Request $request): JsonResponse
    {



        // Validate the person data
        $validate = validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s]+$/u|max:255|unique:persons',
        ]);


        // if validation is successful, update the person
        if ($validate->fails()) {
            $errors = $validate->errors();
            return response()->json([$errors], 400);
        }

        $Person = Persons::find($id);

        if (!$Person) {
            return response()->json(['message' => 'ID not found'], 404);
        }

            // Create the person record
            $Person->name = $request->input('name');

            $Person->update();

            // You may also add other logic here, such as sending an email confirmation to the customer, etc.

            return response()->json(['message' => 'Person updated successfully', 'Person' => $Person], 200);

    }

    // function to delete a person by id
    public function deleteById($id): JsonResponse
    {
        $Person = Persons::find($id);

        if (!$Person) {
            return response()->json(['message' => 'ID not found'], 404);
        }

        $Person->delete();

        return response()->json(['message' => 'Person deleted successfully'], 204);
    }

    // function to delete a person by name
    public function deleteByName(Request $request): JsonResponse
    {

        // Validate the person data
        $validate = validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s]+$/u|max:255',
        ]);

        if ($validate->fails()) {
            $errors = $validate->errors();
            return response()->json([$errors], 400);
        }

        $name = $request->input('name');

        $Person = Persons::where('name', $name)->first();

        if (!$Person) {
            return response()->json(['message' => 'Person not found'], 404);
        }

        $Person->delete();

        return response()->json(['message' => 'Person deleted successfully'], 204);
    }



}
