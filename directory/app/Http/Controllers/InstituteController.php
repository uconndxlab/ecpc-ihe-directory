<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve filter parameters from the request
        $stateFilter = $request->input('state');
        $levelOfDegreeFilter = $request->input('level_of_degree');
        $formatFilter = $request->input('format');
        $categoryOfCredentialingFilter = $request->input('category_of_credentialing');
    
        // Retrieve all possible filter values
        $states = Institute::pluck('state')->unique();
        $levelsOfDegree = Institute::pluck('level_of_degree')->unique();
        $formats = Institute::pluck('format')->unique();
        $categoriesOfCredentialing = Institute::pluck('category_of_credentialing')->unique();
    
        // Start with all institutes
        $query = Institute::query();
    
        // Apply filters if they are provided
        if ($stateFilter) {
            $query->whereIn('state', (array) $stateFilter);
        }
    
        if ($levelOfDegreeFilter) {
            $query->whereIn('level_of_degree', (array) $levelOfDegreeFilter);
        }
    
        if ($formatFilter) {
            $query->whereIn('format', (array) $formatFilter);
        }
    
        if ($categoryOfCredentialingFilter) {
            $query->whereIn('category_of_credentialing', (array) $categoryOfCredentialingFilter);
        }
    
        // Get filtered and grouped institutes
        $institutes = $query->get()->groupBy(['state', 'ihe']);
    
        // Return view with filtered data
        return view('institutes.index', compact('institutes', 'states', 'levelsOfDegree', 'formats', 'categoriesOfCredentialing'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Institute $Institute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institute $Institute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institute $Institute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institute $Institute)
    {
        //
    }
}
