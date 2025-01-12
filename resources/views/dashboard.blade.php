<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medication Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    }
    .glass-effect {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
    }
    .card-hover {
      transition: all 0.3s ease;
    }
    .card-hover:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 24px -8px rgba(0, 0, 0, 0.15);
    }
  </style>
</head>
<body class="min-h-screen">
  <!-- Navbar -->
  <nav class="glass-effect fixed top-0 w-full z-50 border-b border-blue-100">
    <div class="container mx-auto px-4 py-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-8">
          <div class="flex items-center">
            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
            <h1 class="ml-3 text-xl font-semibold text-gray-800">Medication App</h1>
          </div>
          <div class="hidden md:flex space-x-6">
            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600 font-medium transition duration-150">Dashboard</a>
          </div>
        </div>
        <a href="/create" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-150 shadow-sm hover:shadow">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
          </svg>
          Add Medication
        </a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mx-auto px-4 pt-24 pb-12">
    <div class="max-w-5xl mx-auto space-y-8">
      
      <!-- Morning Section -->
      @if ($morningMeds->isNotEmpty())
      <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
        <div class="flex items-center mb-6">
          <svg class="w-6 h-6 text-yellow-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
          </svg>
          <h2 class="text-xl font-semibold text-gray-800">Morning Medications</h2>
        </div>
        <div class="space-y-4">
          @foreach ($morningMeds as $med)
          <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between">
            <div class="flex-1">
              <h3 class="text-lg font-medium text-gray-800">{{ $med->name }}</h3>
              <p class="text-gray-500 text-sm">{{ ucfirst($med->food_requirement) }}</p>
            </div>
            <div class="flex items-center space-x-4">
              <div class="flex bg-white rounded-lg p-1 shadow-sm">
                <label class="inline-flex items-center">
                  <input type="radio" name="morning-{{ $med->id }}-status" value="taken" class="hidden peer">
                  <span class="px-4 py-2 rounded-lg cursor-pointer text-sm font-medium peer-checked:bg-green-500 peer-checked:text-white hover:bg-green-50 transition-all">
                    Taken
                  </span>
                </label>
                <label class="inline-flex items-center">
                  <input type="radio" name="morning-{{ $med->id }}-status" value="not_taken" class="hidden peer" checked>
                  <span class="px-4 py-2 rounded-lg cursor-pointer text-sm font-medium peer-checked:bg-red-500 peer-checked:text-white hover:bg-red-50 transition-all">
                    Not Taken
                  </span>
                </label>
              </div>
              <form method="POST" action="{{ route('medications.destroy', $med->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 text-gray-400 hover:text-red-500 transition-colors rounded-lg hover:bg-gray-100">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                  </svg>
                </button>
              </form>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif

      <!-- Afternoon Section -->
      @if ($afternoonMeds->isNotEmpty())
      <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
        <div class="flex items-center mb-6">
          <svg class="w-6 h-6 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
          </svg>
          <h2 class="text-xl font-semibold text-gray-800">Afternoon Medications</h2>
        </div>
        <div class="space-y-4">
          @foreach ($afternoonMeds as $med)
          <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between">
            <div class="flex-1">
              <h3 class="text-lg font-medium text-gray-800">{{ $med->name }}</h3>
              <p class="text-gray-500 text-sm">{{ ucfirst($med->food_requirement) }}</p>
            </div>
            <div class="flex items-center space-x-4">
              <div class="flex bg-white rounded-lg p-1 shadow-sm">
                <label class="inline-flex items-center">
                  <input type="radio" name="afternoon-{{ $med->id }}-status" value="taken" class="hidden peer">
                  <span class="px-4 py-2 rounded-lg cursor-pointer text-sm font-medium peer-checked:bg-green-500 peer-checked:text-white hover:bg-green-50 transition-all">
                    Taken
                  </span>
                </label>
                <label class="inline-flex items-center">
                  <input type="radio" name="afternoon-{{ $med->id }}-status" value="not_taken" class="hidden peer" checked>
                  <span class="px-4 py-2 rounded-lg cursor-pointer text-sm font-medium peer-checked:bg-red-500 peer-checked:text-white hover:bg-red-50 transition-all">
                    Not Taken
                  </span>
                </label>
              </div>
              <form method="POST" action="{{ route('medications.destroy', $med->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 text-gray-400 hover:text-red-500 transition-colors rounded-lg hover:bg-gray-100">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                  </svg>
                </button>
              </form>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif

      <!-- Evening Section -->
      @if ($eveningMeds->isNotEmpty())
      <div class="bg-white rounded-2xl shadow-sm p-6 card-hover">
        <div class="flex items-center mb-6">
          <svg class="w-6 h-6 text-indigo-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
          </svg>
          <h2 class="text-xl font-semibold text-gray-800">Evening Medications</h2>
        </div>
        <div class="space-y-4">
          @foreach ($eveningMeds as $med)
          <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between">
            <div class="flex-1">
              <h3 class="text-lg font-medium text-gray-800">{{ $med->name }}</h3>
              <p class="text-gray-500 text-sm">{{ ucfirst($med->food_requirement) }}</p>
            </div>
            <div class="flex items-center space-x-4">
              <div class="flex bg-white rounded-lg p-1 shadow-sm">
                <label class="inline-flex items-center">
                  <input type="radio" name="evening-{{ $med->id }}-status" value="taken" class="hidden peer">
                  <span class="px-4 py-2 rounded-lg cursor-pointer text-sm font-medium peer-checked:bg-green-500 peer-checked:text-white hover:bg-green-50 transition-all">
                    Taken
                  </span>
                </label>
                <label class="inline-flex items-center">
                  <input type="radio" name="evening-{{ $med->id }}-status" value="not_taken" class="hidden peer" checked>
                  <span class="px-4 py-2 rounded-lg cursor-pointer text-sm font-medium peer-checked:bg-red-500 peer-checked:text-white hover:bg-red-50 transition-all">
                    Not Taken
                  </span>
                </label>
              </div>
              <form method="POST" action="{{ route('medications.destroy', $med->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 text-gray-400 hover:text-red-500 transition-colors rounded-lg hover:bg-gray-100">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                  </svg>
                </button>
              </form>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif

    </div>
  </div>
</body>
</html>