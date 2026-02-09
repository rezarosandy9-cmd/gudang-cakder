<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Lalapan & Seafood Cak Der</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .logo-circle {
            background: linear-gradient(135deg, #FFB88C 0%, #FFA366 100%);
            box-shadow: 0 10px 40px rgba(255, 168, 102, 0.4);
        }
        .btn-login {
            background: linear-gradient(135deg, #FF7A59 0%, #FF6347 100%);
            box-shadow: 0 6px 20px rgba(255, 122, 89, 0.5);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 122, 89, 0.6);
        }
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus {
            border-color: #FF6347;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 99, 71, 0.1);
        }
        .bg-pattern {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(255, 179, 140, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 99, 71, 0.1) 0%, transparent 50%);
        }
    </style>
</head>
<body>
    <div class="h-screen w-screen flex">
        <!-- Left Side - Login Form (Fullscreen Half) -->
        <div class="w-full lg:w-1/2 h-full bg-gradient-to-br from-orange-50 via-white to-red-50 bg-pattern flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <!-- Logo -->
                <div class="flex justify-center mb-12">
                    <div class="logo-circle w-52 h-52 rounded-[3.5rem] flex items-center justify-center transform hover:scale-105 transition-transform duration-300">
                        <div class="text-center">
                            <h1 class="text-white font-extrabold text-2xl leading-tight tracking-tight drop-shadow-lg">
                                LALAPAN<br/>
                                <span class="text-3xl">&</span><br/>
                                SEAFOOD<br/>
                                <span class="text-[2.75rem]">CAK DER</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST" class="space-y-7">
                    @csrf
                    
                    <!-- Username Field -->
                    <div>
                        <label class="block text-red-500 font-bold text-sm mb-3 uppercase tracking-wide">
                            Username
                        </label>
                        <input 
                            type="text" 
                            name="username" 
                            required 
                            autofocus 
                            class="input-field w-full px-6 py-5 border-2 border-gray-300 rounded-2xl text-gray-700 font-medium text-lg bg-white"
                            placeholder="Masukkan username"
                        >
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="block text-red-500 font-bold text-sm mb-3 uppercase tracking-wide">
                            Password
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            required 
                            class="input-field w-full px-6 py-5 border-2 border-gray-300 rounded-2xl text-gray-700 font-medium text-lg bg-white"
                            placeholder="Masukkan password"
                        >
                    </div>

                    <!-- Login Button -->
                    <button 
                        type="submit" 
                        class="btn-login w-full py-5 text-white font-bold text-xl rounded-2xl uppercase tracking-wide transition-all duration-300 mt-8"
                    >
                        Login
                    </button>
                </form>

                <!-- Footer Text (Optional) -->
                <p class="text-center text-gray-400 text-sm mt-8">
                    © 2026 Lalapan & Seafood Cak Der
                </p>
            </div>
        </div>

        <!-- Right Side - Image (Fullscreen Half) -->
        <div class="hidden lg:block lg:w-1/2 h-full bg-gradient-to-br from-orange-500 via-orange-600 to-red-600 relative overflow-hidden">
            <!-- Overlay Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27 xmlns=%27http://www.w3.org/2000/svg%27%3E%3Cg fill=%27none%27 fill-rule=%27evenodd%27%3E%3Cg fill=%27%23ffffff%27 fill-opacity=%271%27%3E%3Cpath d=%27M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%27/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>
            
            <!-- Image Container -->
            <div class="absolute inset-0 flex items-center justify-center p-12">
                <div class="w-full h-full max-w-2xl max-h-2xl">
                    <img 
                        src="https://images.unsplash.com/photo-1559847844-5315695dadae?w=800&h=800&fit=crop" 
                        alt="Seafood Platter" 
                        class="w-full h-full object-cover rounded-[3rem] shadow-2xl ring-4 ring-white/20"
                        onerror="this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22600%22 height=%22600%22%3E%3Crect fill=%22%23ff6347%22 width=%22600%22 height=%22600%22/%3E%3Ccircle cx=%22300%22 cy=%22250%22 r=%22100%22 fill=%22%23ff8c69%22 opacity=%220.5%22/%3E%3Ccircle cx=%22250%22 cy=%22320%22 r=%2260%22 fill=%22%23ffa366%22 opacity=%220.5%22/%3E%3Ccircle cx=%22350%22 cy=%22330%22 r=%2270%22 fill=%22%23ffb88c%22 opacity=%220.5%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 font-size=%2232%22 fill=%22white%22 text-anchor=%22middle%22 dominant-baseline=%22middle%22 font-family=%22Arial%22 font-weight=%22bold%22%3ELALAPAN %26 SEAFOOD%3C/text%3E%3Ctext x=%2250%25%22 y=%2258%25%22 font-size=%2248%22 fill=%22white%22 text-anchor=%22middle%22 dominant-baseline=%22middle%22 font-family=%22Arial%22 font-weight=%22bold%22%3ECAK DER%3C/text%3E%3C/svg%3E'"
                    >
                </div>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-10 right-10 w-32 h-32 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-40 h-40 bg-yellow-300/20 rounded-full blur-3xl"></div>
        </div>
    </div>
</body>
</html>