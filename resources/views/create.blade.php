<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medication Form</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200 flex items-center justify-center min-h-screen">
  <div class="bg-white rounded-3xl shadow-xl p-10 max-w-md w-full transform transition-all duration-300 hover:scale-[1.02]">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-8 tracking-tight">Medication Tracker</h1>
    <form method="POST" action="/create">
      @csrf
      <!-- Medication Name -->
      <div class="mb-6">
        <label for="med-name" class="block text-lg text-gray-700 font-medium mb-2">Medication Name</label>
        <input type="text" id="med-name" name="med-name" placeholder="Enter medication name"
               class="w-full px-4 py-3 border border-blue-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300 ease-in-out" required />
      </div>

      <!-- Time of Day -->
      <div class="mb-6">
        <label class="block text-lg text-gray-700 font-medium mb-2">Take at</label>
        <div class="grid grid-cols-3 gap-4">
          <label>
            <input type="checkbox" id="morning" name="time-of-day[]" value="morning" class="hidden peer" />
            <span class="block px-4 py-3 text-center rounded-xl bg-blue-100 text-blue-600 cursor-pointer 
                         transition duration-300 ease-in-out
                         hover:bg-blue-200 
                         peer-checked:bg-blue-500 peer-checked:text-white">Morning</span>
          </label>
          <label>
            <input type="checkbox" id="afternoon" name="time-of-day[]" value="afternoon" class="hidden peer" />
            <span class="block px-4 py-3 text-center rounded-xl bg-blue-100 text-blue-600 cursor-pointer 
                         transition duration-300 ease-in-out
                         hover:bg-blue-200 
                         peer-checked:bg-blue-500 peer-checked:text-white">Afternoon</span>
          </label>
          <label>
            <input type="checkbox" id="evening" name="time-of-day[]" value="evening" class="hidden peer" />
            <span class="block px-4 py-3 text-center rounded-xl bg-blue-100 text-blue-600 cursor-pointer 
                         transition duration-300 ease-in-out
                         hover:bg-blue-200 
                         peer-checked:bg-blue-500 peer-checked:text-white">Evening</span>
          </label>
        </div>
      </div>

      <!-- Dose Instructions -->
      <div class="mb-6">
        <label class="block text-lg text-gray-700 font-medium mb-2">Dose Instructions</label>
        <div class="grid grid-cols-2 gap-4">
          <label>
            <input type="radio" id="with-food" name="food-requirement" value="with-food" class="hidden peer" required />
            <span class="block px-4 py-3 text-center rounded-xl bg-blue-100 text-blue-600 cursor-pointer 
                         transition duration-300 ease-in-out
                         hover:bg-blue-200 
                         peer-checked:bg-blue-500 peer-checked:text-white">With Food</span>
          </label>
          <label>
            <input type="radio" id="without-food" name="food-requirement" value="without-food" class="hidden peer" />
            <span class="block px-4 py-3 text-center rounded-xl bg-blue-100 text-blue-600 cursor-pointer 
                         transition duration-300 ease-in-out
                         hover:bg-blue-200 
                         peer-checked:bg-blue-500 peer-checked:text-white">Without Food</span>
          </label>
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-lg font-semibold rounded-xl 
                     shadow-lg hover:shadow-xl transform transition duration-300 ease-in-out hover:scale-[1.02] active:scale-[0.98]">
        Submit
      </button>
    </form>
  </div>
</body>
</html>