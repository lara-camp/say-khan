<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex bg-white h-screen justify-between items-center p-20 w-full   ">
        <div class="flex items-start  justify-around w-full">
            <div class="w-1/3 bg-white flex justify-center items-center flex-col">
                <div class="w-72 h-72 bg-purple rounded-full">
                </div>
                <div class="p-5 font-bold text-b1 tracking-widest text-gray">Upload Profile Picture</div>
            </div>
            <div class="w-2/3 ">
                <h1 class="text-h1 font-bold  tracking-widest px-14">Register Here</h1>
                <div class="w-full  flex justify-between px-5 gap-4">
                    <div class=" w-1/2 flex flex-col py-5 px-4">
                       <input type="text" class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin " placeholder="Enter User ID">
                       <input type="text" class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin " placeholder="Enter User Name">
                       <input type="text" class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin " placeholder="Enter Email">
                       <input type="password" class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin " placeholder="Enter Password">
                       <input type="text" class=" bg-white bg-transparent  border-2 border-purple px-6 rounded-lg h-12 text-b1 w-full tracking-widest font-thin " placeholder="Enter Status">
                    </div>
                    <div class=" w-1/2 flex flex-col py-5 px-4">
                        
                       <select id="countries" class="bg-white  border-2 border-purple mb-5 px-6 h-12 text-gray-900  rounded-lg focus:ring-purple focus:border-purple text-b1 tracking-widest font-thin ">
                            <option selected >Choose Degrees</option>
                            <option value="">MBBS</option>
                            <option value="">BBMS</option>
                            <option value="">Professor</option>
                            <option value="">Dumb</option>
                        </select>
                        <input type="text" class=" bg-white bg-transparent  border-2 border-purple mb-5 px-6 rounded-lg h-12 text-b1 tracking-widest font-thin " placeholder="Enter Phone Number">
                        <textarea id="message" rows="4" class="block py-4  px-6  w-full text-b1 bg-white rounded-lg border-2 border-purple tracking-widest focus:ring-purple focus:border-purple " placeholder="Enter Address .."></textarea>
                    </div>
                    
                </div>
                <div class="px-14 ">
                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4  bg-white border-purple rounded focus:ring-purple ">
                    <span class=" px-2 text-gray ">Stay signed in until you sign out</span>
                </div>
                <div class="px-10 py-5">
                    <button class="bg-purple w-1/2 p-2 rounded-lg text-white font-bold  text-h2 h-10 tracking-widest hover:bg-green ">Register</button>
                </div>
            </div>

        </div>
    </div>
</body>

</html>

