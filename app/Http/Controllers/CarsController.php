<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|View
     */
    public function index() {
        $cars = Car::all();

        return view('cars.index', [
            'cars' => $cars
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function create() {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        /**$car = new Car;
        *$car->name = $request->input('name');
        $car->founded = $request->input('founded');
        $car->description = $request->input('description');**/

        $car = Car::create([
            'name'=> $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);
        return redirect('/cars');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */

 public function show($id) {

     $car = Car::find($id);

     return view('cars.show')->with('car', $car);


 }




/**     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $car = Car::find($id)->first();
        return view('cars.edit')->with('car', $car);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {

        $car = Car::where('id', $id)->update([
            'name'=> $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);
        return redirect('/cars');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Car $car) {

        $car->delete();
        return redirect('/cars');

    }
}
