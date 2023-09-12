# API Documentation

This document provides information on the REST API for managing a "Person" resource.

## Application Endpoint
[http://35.153.44.149/api](http://35.153.44.149/api)

## Table of Contents
1. [API Endpoints/Routes](#routes)
2. [Standard Formats](#standard-formats)
3. [Sample API Usage](#sample-api-usage)
4. [Limitations and Assumptions](#limitations-and-assumptions)

<h2 id=routes> 1. Routes </h2>

## API Endpoints/Routes
| HTTP Method	 | Path  | Body            | Parameter          | Action       | Description             |
|--------------|-------|-----------------|--------------------|--------------|-------------------------|
| GET          | /     | -               | name=_John Doe_    | index        | Get Details by name     |
| GET          | /{id} | -               | -                  | showById     | Get Details by id       |
| POST         | /     | name=_John Doe_ | -                  | store        | Create a new person     |
| PUT          | /{id} | -               | name=_Jesse Jason_ | editById     | Update a person by id   |
| DELETE       | /{id} | -               | -                  | deleteById   | Delete a person by id   |
| DELETE       | /     | -               | name=_Jesse Jason_ | deleteByName | Delete a person by name |


<h2 id=standard-formats> 2. Standard Formats </h2>

### Request Format
All requests should be made using the JSON format with the following structure:

```json
{
  "name": "John Doe"
}
```

### Response Format
API responses are in JSON format and include a message and data field (or errors for validation failures) as follows:

#### Successful Response

```json
{
  "message": "Person created successfully",
  "data": {
      "name": "John Doe",
      "updated_at": "2023-09-10T21:31:20.000000Z",
      "created_at": "2023-09-10T21:31:20.000000Z",
      "id": 3
  }
}
```

#### Validation Failure Response

```json
{
  "errors": {
    "name": [
      "The name field format is invalid."
    ]
  }
}
```
<h2 id=sample-api-usage> 3. Sample API Usage </h2>

<h3>Create a New Person</h3>
<h4>Request</h4>



```json lines
POST /

{
  "name": "John Doe"
}
```

<h4>Response(Success)</h4>

```json lines
{
  "message": "Person created successfully",
  "data": {
      "name": "John Doe",
      "updated_at": "2023-09-10T21:31:20.000000Z",
      "created_at": "2023-09-10T21:31:20.000000Z",
      "id": 1
  }
}
```
Sampe API Usage
```text
http://35.153.44.149/api
```

<h4>Response(Validation Failure)</h4>

```json lines
{
  "errors": {
    "name": [
      "The name has already been taken."
    ]
  }
}
```

<h3> Retrieve a Person by Name</h3>
<h4>Request</h4>

```json lines
GET /

Query Parameter
    - name
```

<h4>Response(Success)</h4>

```json lines
{
  "message": "Person retrieved successfully",
  "data": {
      "id": 1,
      "name": "John Doe",
      "updated_at": "2023-09-10T21:31:20.000000Z",
      "created_at": "2023-09-10T21:31:20.000000Z",
  }
}
```

<h4>Response(Name Error)</h4>

```json lines
  {
      "Message": "Name not found"
  }
```
Sampe API Usage:
```text
http://35.153.44.149/api?name=John%20Doe
```

<h3> Update a Person by ID</h3>

<h4>Request</h4>
```
PUT /{ID}
```

```json lines
Parameter 
{
  "name": "Jane Doe"
}
```

<h4>Response(Success)</h4>

```json lines
{
  "message": "Person updated successfully",
  "data": {
      "id": 1,
      "name": "Jane Doe",
      "updated_at": "2023-09-10T21:31:20.000000Z",
      "created_at": "2023-09-10T21:31:20.000000Z",
  }
}
```

<h4>Response(Validation Failure)</h4>

```json lines
{
  "errors": {
    "name": [
      "The name has already been taken."
    ]
  }
}
```
Sampe API Usage:
```text
http://35.153.44.149/api/1?name=Jane%20Doe
```

<h3> Delete a Person by ID</h3>

<h4>Request</h4>

```
DELETE /{ID}
```

<h4>Response(Success)</h4>

```json 
{
  "message": "Person deleted successfully"
}
```

<h4>Response(Validation Failure)</h4>

```json lines
{
  "message": "ID not found"
}
```
Sampe API Usage:
```text
http://35.153.44.149/api/1
```

<h3> Delete a Person by Name</h3>
<h4>Request</h4>

```
DELETE /?name={name}
```

<h4>Response(Success)</h4>

```json 
{
  "message": "Person deleted successfully"
}
```

<h4>Response(Validation Failure)</h4>

```json lines
{
  "message": "Person not found"
}
```
Sampe API Usage:
```text
http://35.153.44.149/api?name=Jane%20Doe
```

<h2 id=limitations-and-assumptions> 4. Limitations and Assumptions </h2>

- This API assumes that names are unique when creating or searching for people.
- Validation is performed on the request data to ensure the correctness of inputs.

