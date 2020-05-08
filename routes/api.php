<?php

use Illuminate\Http\Request,
    Illuminate\Support\Facades\Route,
    Illuminate\Support\Facades\Validator;

use App\Appointment,
    App\Customer,
    App\Mechanic,
    App\MechanicSpecialty,
    App\Vehicle,
    App\Rules\IsJobType,
    App\Rules\CustomerExists,
    App\Rules\CustomerEmailIsUnique,
    App\Rules\MechanicExists,
    App\Rules\MechanicEligible,
    App\Rules\MechanicAvailable,
    App\Rules\MechanicRequiresSpeciality,
    App\Http\Resources\Appointment as AppointmentResource,
    App\Http\Resources\Appointments as AppointmentsResource,
    App\Http\Resources\Customer as CustomerResource,
    App\Http\Resources\Customers as CustomersResource,
    App\Http\Resources\Mechanic as MechanicResource,
    App\Http\Resources\Mechanics as MechanicsResource,
    App\Http\Resources\MechanicSpecialty as MechanicSpecialtyResource,
    App\Http\Resources\MechanicSpecialties as MechanicSpecialtiesResource,
    App\Http\Resources\Vehicles as VehiclesResource,
    App\Http\Resources\Vehicle as VehicleResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Appointment Endpoints
 */

// get /appointment
Route::get('/appointment', function () {
    return new AppointmentsResource(Appointment::all());
});

// post /appointment
Route::post('/appointment', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'drop_off'              => ['required', 'date'],
        'pick_up'               => ['required', 'date'],
        'appointment_job_type'  => ['required', 'string', new IsJobType()],
        'mechanic_id'           => ['required', 'integer', 
                                    new MechanicAvailable($request), 
                                    new MechanicRequiresSpeciality($request)],
        'vehicle_id'            => ['required', 'integer'],
    ]);

    if ($validator->fails()) {
        return response()->json(['meta' => ['errors'=>$validator->errors()]], 400);
    }

    $appointment = Appointment::create($request->all());
    return (new AppointmentResource($appointment))
        ->additional(['meta' => [
            'message' => "Appointment with id: $appointment->id was created.",
        ]]);
});

// get /appointment/{id}
Route::get('/appointment/{id}', function ($id) {
    return new AppointmentResource(Appointment::findOrFail($id));
});

// put /appointment/{id}
Route::put('/appointment/{id}', function (Request $request, $id) {
    $validator = Validator::make($request->all(), [
        'drop_off'              => ['required', 'date'],
        'pick_up'               => ['required', 'date'],
        'appointment_job_type'  => ['required', 'string', new IsJobType()],
        'mechanic_id'           => ['required', 'integer', 
                                    new MechanicAvailable($request, $id),
                                    new MechanicRequiresSpeciality($request)],
        'vehicle_id'            => ['required', 'integer'],
    ]);

    if ($validator->fails()) {
        return response()->json(['meta' => ['errors'=>$validator->errors()]], 400);
    }

    $appointment = Appointment::findOrFail($id);
    $appointment->update($request->all());
    return (new AppointmentResource(Appointment::find($id)))
        ->additional(['meta' => [
            'message' => "Appointment with id: $id was updated.",
        ]]);
});

// delete /appointment/{id}
Route::delete('/appointment/{id}', function (Request $request, $id) {
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();
    return response()->json([ 'meta' => ['message' => "Appointment with id: $id was deleted."]]);
});

/**
 * Customer Endpoints
 */

// get /customer
Route::get('/customer', function (Request $request) {

    // Look up existing customer by name, phone, or email
    // eg: get /customer?email=garyjefferson2998@gmail.com
    // eg: get /customer?first_name=gary&last_name=jefferson
    $firstName = $request->query('first_name');
    $lastName = $request->query('last_name');
    $phoneNumber = $request->query('phone_number');
    $email = $request->query('email');

    $customers = Customer::when($firstName, function ($query, $firstName) {
            return $query->where('first_name', $firstName);
        })->when($lastName, function ($query, $lastName) {
            return $query->where('last_name', $lastName);
        })
        ->when($phoneNumber, function ($query, $phoneNumber) {
            return $query->where('phone_number', $phoneNumber);
        })
        ->when($email, function ($query, $email) {
            return $query->where('email', $email);
        })
        ->get();

    return new CustomersResource($customers);
});

// post /customer
Route::post('/customer', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'first_name'    => ['required', 'string'],
        'last_name'     => ['required', 'string'],
        'address'       => ['required', 'string'],
        'phone_number'  => ['required', 'string'],
        'email'         => ['required', 'string', new CustomerEmailIsUnique()],
    ]);

    if ($validator->fails()) {
        return response()->json(['meta' => ['errors'=>$validator->errors()]], 400);
    }

    $customer = Customer::create($request->all());
    return (new CustomerResource($customer))
        ->additional(['meta' => [
            'message' => "Customer with id: $customer->id was created.",
        ]]);
});

// get /customer/{id}
Route::get('/customer/{id}', function ($id) {
    return new CustomerResource(Customer::find($id));
});

// put /customer/{id}
Route::put('/customer/{id}', function (Request $request, $id) {
    $validator = Validator::make($request->all(), [
        'first_name'    => ['required', 'string'],
        'last_name'     => ['required', 'string'],
        'address'       => ['required', 'string'],
        'phone_number'  => ['required', 'string'],
        'email'         => ['required', 'string', new CustomerEmailIsUnique($id)],
    ]);

    if ($validator->fails()) {
        return response()->json(['meta' => ['errors'=>$validator->errors()]], 400);
    }

    $customer = Customer::findOrFail($id);
    $customer->update($request->all());
    return (new CustomerResource(Customer::find($id)))
        ->additional(['meta' => [
            'message' => "Customer with id: $id was updated.",
        ]]);
});

// get /delete/{id}
Route::delete('/customer/{id}', function (Request $request, $id) {
    $customer = Customer::findOrFail($id);
    $customer->delete();
    return response()->json([ 'meta' => ['message' => "Customer with id: $id was deleted."]]);
});

/**
 * Mechanic Endpoints
 */

// get /mechanic
Route::get('/mechanic', function () {
    return new MechanicsResource(Mechanic::all());
});

// post /mechanic
Route::post('/mechanic', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'first_name'    => ['required', 'string'],
        'last_name'     => ['required', 'string'],
    ]);

    if ($validator->fails()) {
        return response()->json(['meta' => ['errors'=>$validator->errors()]], 400);
    }

    $mechanic = Mechanic::create($request->all());
    return (new MechanicResource($mechanic))
        ->additional(['meta' => [
            'message' => "Mechanic with id: $mechanic->id was created.",
        ]]);
});

// get /mechanic/{id}
Route::get('/mechanic/{id}', function ($id) {
    return new MechanicResource(Mechanic::find($id));
});

// put /mechanic/{id}
Route::put('/mechanic/{id}', function (Request $request, $id) {
    $validator = Validator::make($request->all(), [
        'first_name'    => ['required', 'string'],
        'last_name'     => ['required', 'string'],
    ]);

    if ($validator->fails()) {
        return response()->json(['meta' => ['errors'=>$validator->errors()]], 400);
    }

    $mechanic = Mechanic::findOrFail($id);
    $mechanic->update($request->all());
    return (new MechanicResource(Mechanic::find($id)))
        ->additional(['meta' => [
            'message' => "Mechanic with id: $id was updated.",
        ]]);
});

// delete /mechanic/{id}
Route::delete('/mechanic/{id}', function (Request $request, $id) {
    $mechanic = Mechanic::findOrFail($id);
    foreach($mechanic->specialties as $specialty) {
        $specialty->delete();
    }
    foreach($mechanic->appointments as $appointment) {
        $appointment->delete();
    }
    $mechanic->delete();
    return response()->json([ 'meta' => ['message' => "Mechanic with id: $id was deleted."]]);
});

/**
 * MechanicSpecialty Endpoints
 */

// get /mechanicspecialty
Route::get('/mechanicspecialty', function () {
    return new MechanicSpecialtiesResource(MechanicSpecialty::all());
});

// post /mechanicspecialty
Route::post('/mechanicspecialty', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'job_type'      => ['required','', 'string', new IsJobType()],
        'mechanic_id'   => ['required', 'integer', 
                            new MechanicExists(), 
                            new MechanicRequiresSpeciality($request)],
    ]);

    if ($validator->fails()) {
        return response()->json(['meta' => ['errors'=>$validator->errors()]], 400);
    }

    $mechanicspecialty = MechanicSpecialty::create($request->all());
    return (new MechanicSpecialtyResource($mechanicspecialty))
        ->additional(['meta' => [
            'message' => "MechanicSpecialty with id: $mechanicspecialty->id was created.",
        ]]);
});

// get /mechanicspecialty/{id}
Route::get('/mechanicspecialty/{id}', function ($id) {
    return new MechanicSpecialtyResource(MechanicSpecialty::find($id));
});

// put /mechanicspecialty/{id}
Route::put('/mechanicspecialty/{id}', function (Request $request, $id) {
    $validator = Validator::make($request->all(), [
        'job_type'      => ['required','', 'string', new IsJobType()],
        'mechanic_id'   => ['required', 'integer', 
                            new MechanicExists(), 
                            new MechanicRequiresSpeciality($request)],
    ]);

    if ($validator->fails()) {
        return response()->json(['meta' => ['errors'=>$validator->errors()]], 400);
    }

    $mechanicspecialty = MechanicSpecialty::findOrFail($id);
    $mechanicspecialty->update($request->all());
    return (new MechanicSpecialtyResource(MechanicSpecialty::find($id)))
        ->additional(['meta' => [
            'message' => "MechanicSpecialty with id: $id was updated.",
        ]]);
});

// delete /mechanicspecialty/{id}
Route::delete('/mechanicspecialty/{id}', function (Request $request, $id) {
    $mechanicspecialty = MechanicSpecialty::findOrFail($id);
    $mechanicspecialty->delete();
    return response()->json([ 'meta' => ['message' => "MechanicSpecialty with id: $id was deleted."]]);
});

/**
 * Vehicle Endpoints
 */

// get /vehicle
Route::get('/vehicle', function () {
    return new VehiclesResource(Vehicle::all());
});

Route::post('/vehicle', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'make'          => ['required', 'string'],
        'model'         => ['required', 'string'],
        'year'          => ['required', 'integer'],
        'notes'         => ['string'],
        'customer_id'   => ['required', 'integer', new CustomerExists()],
    ]);

    if ($validator->fails()) {
        return response()->json(['meta' => ['errors'=>$validator->errors()]], 400);
    }

    $vehicle = Vehicle::create($request->all());
    return (new VehicleResource($vehicle))
        ->additional(['meta' => [
            'message' => "Vehicle with id: $vehicle->id was created.",
        ]]);
});

// post /vehicle/{id}
Route::get('/vehicle/{id}', function ($id) {
    return new VehicleResource(Vehicle::find($id));
});

// put /vehicle/{id}
Route::put('/vehicle/{id}', function (Request $request, $id) {
    $validator = Validator::make($request->all(), [
        'make'          => ['required', 'string'],
        'model'         => ['required', 'string'],
        'year'          => ['required', 'integer'],
        'notes'         => ['string'],
        'customer_id'   => ['required', 'integer', new CustomerExists()],
    ]);

    if ($validator->fails()) {
        return response()->json(['meta' => ['errors'=>$validator->errors()]], 400);
    }

    $vehicle = Vehicle::findOrFail($id);
    $vehicle->update($request->all());
    return (new VehicleResource(Vehicle::find($id)))
        ->additional(['meta' => [
            'message' => "Vehicle with id: $id was updated.",
        ]]);
});

// delete /vehicle/{id}
Route::delete('/vehicle/{id}', function (Request $request, $id) {
    $vehicle = Vehicle::findOrFail($id);
    foreach($vehicle->appointments as $appointment) {
        $appointment->delete();
    }
    $vehicle->delete();
    return response()->json([ 'meta' => ['message' => "Vehicle with id: $id was deleted."]]);
});