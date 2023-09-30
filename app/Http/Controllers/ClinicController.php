<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\Clinic\ClinicInterface;


class ClinicController extends Controller
{
    public $clinic;
    public function __construct(ClinicInterface $clinicInterface)
    {
        $this->clinic = $clinicInterface;
    }

    public function index()
    {
        $clinics = $this->clinic->all();
        return view('Admin.clinic.index', compact('clinics'));
    }

    public function create()
    {
        return view("Admin.clinic.create");
    }
}