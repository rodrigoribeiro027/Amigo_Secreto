<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $query = Person::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        $people = $query->get();

        return view('people.index', compact('people'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Person::create($request->all());

        return redirect()->route('people.index')->with('success', 'Pessoa cadastrada com sucesso!');
    }

    public function edit(Person $person)
    {
        return view('people.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people,email,' . $person->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $person->update($request->all());

        return redirect()->route('people.index')->with('success', 'Pessoa atualizada com sucesso!');
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('people.index')->with('success', 'Pessoa deletada com sucesso!');
    }

    public function draw()
{
    $people = Person::all();
    $results = [];

    do {
        $drawnNames = $people->shuffle();
        $isValid = true;

        foreach ($people as $index => $person) {
            if ($person->id == $drawnNames[$index]->id) {
                $isValid = false;
                break;
            }
        }
    } while (!$isValid);

    foreach ($people as $index => $person) {
        $results[] = "{$person->name} tirou {$drawnNames[$index]->name}";
    }

    return view('people.draw', compact('results'));
}

}
