<?php

namespace App\Http\Controllers;

use App\Models\Persons;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{

    public function index(): JsonResponse
    {
        //$Person = Persons::all();

        return response()->json(['message' => 'Viewing all users is disabled, please search by name to view a specific user.'], 200);
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
    public function showByName($name): JsonResponse
    {
        $person = Persons::where('name', $name)->first();

        if (!$person) {
            return response()->json(['Message' => 'Name not found'], 404);
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

        $Person = Persons::find($id);

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
            return response()->json(['message' => 'Person not found'], 404);
        }

        $Person->delete();

        return response()->json(['message' => 'Person deleted successfully']);
    }



}
