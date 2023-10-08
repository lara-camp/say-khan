<?php


namespace App\Repositories\Interfaces\Assistant;

use Illuminate\Http\Request;

Interface AssistantInterface{
    public function all();
    
    public function store($data);

    public function show($id);
    
    public function edit($id);
    
    public function update($data,$id);
    
    public function delete($id);

    public function changePassword(Request $request);
}