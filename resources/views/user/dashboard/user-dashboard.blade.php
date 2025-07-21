<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sujoy Saha</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700&display=swap');

        :root {
            --primary: #00f0ff;
            --secondary: #ff00f0;
            --dark: #0a0a1a;
            --light: #e0e0ff;
        }

        body {
            font-family: 'Rajdhani', sans-serif;
            background-color: var(--dark);
            color: var(--light);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, .orbitron {
            font-family: 'Orbitron', sans-serif;
        }

        .gradient-text {
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .glow {
            text-shadow: 0 0 10px rgba(0, 240, 255, 0.7);
        }

        .neon-border {
            position: relative;
            border: 2px solid transparent;
            border-radius: 0.5rem;
        }

        .neon-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 0.5rem;
            padding: 2px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        .holographic-bg {
            background: linear-gradient(135deg, rgba(10, 10, 26, 0.8), rgba(0, 0, 20, 0.9));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .tech-icon {
            transition: all 0.3s ease;
        }

        .tech-icon:hover {
            transform: translateY(-5px) scale(1.1);
            filter: drop-shadow(0 0 10px var(--primary));
        }

        .project-card {
            transition: all 0.3s ease;
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        .project-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 30px rgba(0, 240, 255, 0.2);
        }

        .hexagon {
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
        }

        .cursor-trail {
            position: fixed;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: radial-gradient(circle, var(--primary), transparent 70%);
            pointer-events: none;
            transform: translate(-50%, -50%);
            mix-blend-mode: screen;
            z-index: 9999;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
</head>
<body class="min-h-screen">
<!-- Cursor Trail -->
<div class="cursor-trail"></div>

<!-- Particles Background -->
<div id="particles-js"></div>

<!-- Navigation -->
<nav class="fixed w-full z-50 holographic-bg border-b border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <span class="text-2xl font-bold gradient-text orbitron">SUJOY</span>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="#home" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium orbitron hover:glow transition-all">HOME</a>
                    <a href="#about" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium orbitron hover:glow transition-all">ABOUT</a>
                    <a href="#skills" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium orbitron hover:glow transition-all">SKILLS</a>
                    <a href="#projects" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium orbitron hover:glow transition-all">PROJECTS</a>
                    <a href="#contact" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium orbitron hover:glow transition-all">CONTACT</a>
                </div>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-300 hover:text-white focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden holographic-bg border-t border-gray-800">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#home" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium orbitron">HOME</a>
            <a href="#about" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium orbitron">ABOUT</a>
            <a href="#skills" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium orbitron">SKILLS</a>
            <a href="#projects" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium orbitron">PROJECTS</a>
            <a href="#contact" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium orbitron">CONTACT</a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="home" class="relative pt-32 pb-20 md:pt-40 md:pb-32 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="text-center md:text-left">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 orbitron gradient-text glow">
                    <span class="block">SUJOY</span>
                    <span class="block">SAHA</span>
                </h1>
                <h2 class="text-xl md:text-2xl lg:text-3xl mb-8 orbitron text-gray-300">
                    <div class="gradient-text">SOFTWARE ENGINEER &</div>
                    <div class="gradient-text">TECH INNOVATOR</div>
                </h2>
                <p class="text-lg mb-8 text-gray-300 max-w-lg mx-auto md:mx-0">
                    Building smart, scalable solutions with modern web tech—crafting immersive UIs, optimizing backend systems, and exploring AI-driven innovation.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="#projects" class="px-8 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-md text-white font-bold orbitron hover:from-cyan-600 hover:to-blue-700 transition-all transform hover:scale-105 shadow-lg shadow-cyan-500/20">
                        VIEW WORK
                    </a>
                    <a href="#contact" class="px-8 py-3 border border-cyan-500 rounded-md text-cyan-400 font-bold orbitron hover:bg-cyan-500/10 transition-all transform hover:scale-105">
                        CONTACT ME
                    </a>
                </div>
            </div>
            <div class="relative flex justify-center">
                <div class="hexagon w-64 h-72 md:w-80 md:h-90 bg-gradient-to-br from-cyan-500/20 to-blue-600/20 flex items-center justify-center floating">
                    <div class="hexagon w-60 h-68 md:w-76 md:h-86 bg-gradient-to-br from-cyan-500/30 to-blue-600/30 flex items-center justify-center">
                        <div class="hexagon w-56 h-64 md:w-72 md:h-82 bg-gradient-to-br from-cyan-500/40 to-blue-600/40 flex items-center justify-center">
                            <img src="{{ asset('storage/sujoy.jpg') }}" alt="Sujoy Saha" class="hexagon w-full h-full object-cover">

                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 w-40 h-2 bg-cyan-500 rounded-full blur-xl opacity-30"></div>
            </div>
        </div>
    </div>

    <!-- Floating Tech Icons -->
    <div class="absolute top-1/4 left-10 text-4xl text-cyan-400 opacity-30 floating">
        <i class="fab fa-ethereum"></i>
    </div>
    <div class="absolute top-1/3 right-20 text-5xl text-blue-400 opacity-30 floating" style="animation-delay: 0.5s;">
        <i class="fab fa-react"></i>
    </div>
    <div class="absolute bottom-1/4 left-1/4 text-3xl text-purple-400 opacity-30 floating" style="animation-delay: 1s;">
        <i class="fab fa-node-js"></i>
    </div>
    <div class="absolute top-1/2 right-1/3 text-6xl text-pink-400 opacity-20 floating" style="animation-delay: 1.5s;">
        <i class="fas fa-robot"></i>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900/50 to-gray-900/80">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-16 text-center orbitron gradient-text">
            <span class="glow">ABOUT ME</span>
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <div class="neon-border p-8 rounded-lg bg-gray-900/50">
                    <h3 class="text-2xl md:text-3xl font-bold mb-6 orbitron text-cyan-400">
                        WHO AM I?
                    </h3>
                    <p class="text-gray-300 mb-6 text-lg">
                        I'm a forward-thinking software engineer with a passion for creating innovative solutions that push the boundaries of technology. With over 8 years of experience in the industry, I've worked on projects ranging from AI-powered applications to decentralized blockchain systems.
                    </p>
                    <p class="text-gray-300 mb-6 text-lg">
                        My approach combines technical expertise with creative problem-solving to deliver cutting-edge solutions. I thrive in environments that challenge me to think outside the box and leverage emerging technologies to create impactful products.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-cyan-500 mr-3 pulse"></div>
                            <span class="text-gray-300">Full-Stack Development</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-pink-500 mr-3 pulse" style="animation-delay: 0.5s;"></div>
                            <span class="text-gray-300">AI & Machine Learning</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-purple-500 mr-3 pulse" style="animation-delay: 1s;"></div>
                            <span class="text-gray-300">Blockchain Technology</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-blue-500 mr-3 pulse" style="animation-delay: 1.5s;"></div>
                            <span class="text-gray-300">Cloud Architecture</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="neon-border p-8 rounded-lg bg-gray-900/50 h-full">
                    <h3 class="text-2xl md:text-3xl font-bold mb-6 orbitron text-cyan-400">
                        MY JOURNEY
                    </h3>

                    <div class="space-y-8">
                        <div class="relative pl-8">
                            <div class="absolute left-0 top-1 w-4 h-4 rounded-full bg-cyan-500 border-2 border-cyan-300"></div>
                            <div class="absolute left-2 top-5 bottom-0 w-0.5 bg-gradient-to-b from-cyan-500 to-transparent"></div>
                            <div>
                                <h4 class="text-xl font-bold text-white orbitron">Lead Developer</h4>
                                <p class="text-gray-400">Quantum Innovations | 2021 - Present</p>
                                <p class="text-gray-300 mt-2">Leading a team to develop next-gen AI solutions for enterprise clients.</p>
                            </div>
                        </div>

                        <div class="relative pl-8">
                            <div class="absolute left-0 top-1 w-4 h-4 rounded-full bg-pink-500 border-2 border-pink-300"></div>
                            <div class="absolute left-2 top-5 bottom-0 w-0.5 bg-gradient-to-b from-pink-500 to-transparent"></div>
                            <div>
                                <h4 class="text-xl font-bold text-white orbitron">Senior Developer</h4>
                                <p class="text-gray-400">Nexus Labs | 2018 - 2021</p>
                                <p class="text-gray-300 mt-2">Developed blockchain-based solutions for secure transactions.</p>
                            </div>
                        </div>

                        <div class="relative pl-8">
                            <div class="absolute left-0 top-1 w-4 h-4 rounded-full bg-purple-500 border-2 border-purple-300"></div>
                            <div>
                                <h4 class="text-xl font-bold text-white orbitron">Software Engineer</h4>
                                <p class="text-gray-400">TechFusion | 2015 - 2018</p>
                                <p class="text-gray-300 mt-2">Built scalable web applications for global clients.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900/80 to-gray-900/50">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-16 text-center orbitron gradient-text">
            <span class="glow">TECHNICAL SKILLS</span>
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <!-- Tech Stack Items -->
            <div class="tech-icon flex flex-col items-center p-6 neon-border rounded-lg bg-gray-900/50 hover:bg-gray-900/70">
                <i class="fab fa-react text-5xl text-cyan-400 mb-4"></i>
                <h3 class="text-xl font-bold orbitron text-white">React</h3>
                <div class="w-full bg-gray-800 rounded-full h-2 mt-4">
                    <div class="bg-cyan-500 h-2 rounded-full" style="width: 90%"></div>
                </div>
            </div>

            <div class="tech-icon flex flex-col items-center p-6 neon-border rounded-lg bg-gray-900/50 hover:bg-gray-900/70">
                <i class="fab fa-node-js text-5xl text-green-500 mb-4"></i>
                <h3 class="text-xl font-bold orbitron text-white">Node.js</h3>
                <div class="w-full bg-gray-800 rounded-full h-2 mt-4">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                </div>
            </div>

            <div class="tech-icon flex flex-col items-center p-6 neon-border rounded-lg bg-gray-900/50 hover:bg-gray-900/70">
                <i class="fab fa-python text-5xl text-blue-400 mb-4"></i>
                <h3 class="text-xl font-bold orbitron text-white">Python</h3>
                <div class="w-full bg-gray-800 rounded-full h-2 mt-4">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: 80%"></div>
                </div>
            </div>

            <div class="tech-icon flex flex-col items-center p-6 neon-border rounded-lg bg-gray-900/50 hover:bg-gray-900/70">
                <i class="fas fa-database text-5xl text-yellow-400 mb-4"></i>
                <h3 class="text-xl font-bold orbitron text-white">MySQL</h3>
                <div class="w-full bg-gray-800 rounded-full h-2 mt-4">
                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 75%"></div>
                </div>
            </div>

            <div class="tech-icon flex flex-col items-center p-6 neon-border rounded-lg bg-gray-900/50 hover:bg-gray-900/70">
                <i class="fab fa-ethereum text-5xl text-purple-400 mb-4"></i>
                <h3 class="text-xl font-bold orbitron text-white">Solidity</h3>
                <div class="w-full bg-gray-800 rounded-full h-2 mt-4">
                    <div class="bg-purple-500 h-2 rounded-full" style="width: 70%"></div>
                </div>
            </div>

            <div class="tech-icon flex flex-col items-center p-6 neon-border rounded-lg bg-gray-900/50 hover:bg-gray-900/70">
                <i class="fas fa-brain text-5xl text-pink-500 mb-4"></i>
                <h3 class="text-xl font-bold orbitron text-white">TensorFlow</h3>
                <div class="w-full bg-gray-800 rounded-full h-2 mt-4">
                    <div class="bg-pink-500 h-2 rounded-full" style="width: 75%"></div>
                </div>
            </div>

            <div class="tech-icon flex flex-col items-center p-6 neon-border rounded-lg bg-gray-900/50 hover:bg-gray-900/70">
                <i class="fab fa-aws text-5xl text-orange-400 mb-4"></i>
                <h3 class="text-xl font-bold orbitron text-white">AWS</h3>
                <div class="w-full bg-gray-800 rounded-full h-2 mt-4">
                    <div class="bg-orange-500 h-2 rounded-full" style="width: 80%"></div>
                </div>
            </div>

            <div class="tech-icon flex flex-col items-center p-6 neon-border rounded-lg bg-gray-900/50 hover:bg-gray-900/70">
                <i class="fas fa-server text-5xl text-red-400 mb-4"></i>
                <h3 class="text-xl font-bold orbitron text-white">Docker</h3>
                <div class="w-full bg-gray-800 rounded-full h-2 mt-4">
                    <div class="bg-red-500 h-2 rounded-full" style="width: 85%"></div>
                </div>
            </div>

            <div class="tech-icon flex flex-col items-center p-6 neon-border rounded-lg bg-gray-900/50 hover:bg-gray-900/70">
                <i class="fas fa-code-branch text-5xl text-blue-300 mb-4"></i>
                <h3 class="text-xl font-bold orbitron text-white">Git</h3>
                <div class="w-full bg-gray-800 rounded-full h-2 mt-4">
                    <div class="bg-blue-400 h-2 rounded-full" style="width: 90%"></div>
                </div>
            </div>

            <div class="tech-icon flex flex-col items-center p-6 neon-border rounded-lg bg-gray-900/50 hover:bg-gray-900/70">
                <i class="fas fa-terminal text-5xl text-green-400 mb-4"></i>
                <h3 class="text-xl font-bold orbitron text-white">Linux</h3>
                <div class="w-full bg-gray-800 rounded-full h-2 mt-4">
                    <div class="bg-green-400 h-2 rounded-full" style="width: 75%"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900/50 to-gray-900/80">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-16 text-center orbitron gradient-text">
            <span class="glow">RECENT PROJECTS</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Project 1 -->
            <div class="project-card neon-border rounded-lg overflow-hidden bg-gray-900/50">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1639762681057-408e52192e55?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80"
                         alt="Quantum AI Platform"
                         class="w-full h-full object-cover transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h3 class="text-xl font-bold text-white orbitron">Quantum AI Platform</h3>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="text-xs px-2 py-1 bg-cyan-500/20 text-cyan-400 rounded">AI</span>
                            <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-400 rounded">Machine Learning</span>
                            <span class="text-xs px-2 py-1 bg-blue-500/20 text-blue-400 rounded">React</span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-300 mb-4">
                        An advanced AI platform that leverages quantum computing principles to solve complex optimization problems.
                    </p>
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-cyan-400 hover:text-cyan-300 orbitron font-bold text-sm flex items-center">
                            VIEW DETAILS <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <div class="flex space-x-2">
                            <a href="#" class="text-gray-400 hover:text-white">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 2 -->
            <div class="project-card neon-border rounded-lg overflow-hidden bg-gray-900/50">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1639762681057-408e52192e55?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80"
                         alt="Nexus Blockchain"
                         class="w-full h-full object-cover transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h3 class="text-xl font-bold text-white orbitron">Nexus Blockchain</h3>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-400 rounded">Blockchain</span>
                            <span class="text-xs px-2 py-1 bg-green-500/20 text-green-400 rounded">Smart Contracts</span>
                            <span class="text-xs px-2 py-1 bg-yellow-500/20 text-yellow-400 rounded">Solidity</span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-300 mb-4">
                        A high-performance blockchain network with smart contract capabilities and cross-chain interoperability.
                    </p>
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-cyan-400 hover:text-cyan-300 orbitron font-bold text-sm flex items-center">
                            VIEW DETAILS <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <div class="flex space-x-2">
                            <a href="#" class="text-gray-400 hover:text-white">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project 3 -->
            <div class="project-card neon-border rounded-lg overflow-hidden bg-gray-900/50">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1639762681057-408e52192e55?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80"
                         alt="AR Vision Glasses"
                         class="w-full h-full object-cover transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-4">
                        <h3 class="text-xl font-bold text-white orbitron">AR Vision Glasses</h3>
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="text-xs px-2 py-1 bg-pink-500/20 text-pink-400 rounded">AR/VR</span>
                            <span class="text-xs px-2 py-1 bg-blue-500/20 text-blue-400 rounded">IoT</span>
                            <span class="text-xs px-2 py-1 bg-red-500/20 text-red-400 rounded">Unity</span>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-300 mb-4">
                        Augmented reality glasses with real-time object recognition and contextual information overlay.
                    </p>
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-cyan-400 hover:text-cyan-300 orbitron font-bold text-sm flex items-center">
                            VIEW DETAILS <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <div class="flex space-x-2">
                            <a href="#" class="text-gray-400 hover:text-white">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-16">
            <a href="#" class="inline-flex items-center px-8 py-3 border border-cyan-500 rounded-md text-cyan-400 font-bold orbitron hover:bg-cyan-500/10 transition-all transform hover:scale-105">
                VIEW ALL PROJECTS <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900/80 to-gray-900">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-16 text-center orbitron gradient-text">
            <span class="glow">GET IN TOUCH</span>
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="neon-border p-8 rounded-lg bg-gray-900/50">
                <h3 class="text-2xl md:text-3xl font-bold mb-6 orbitron text-cyan-400">
                    SEND ME A MESSAGE
                </h3>

                <form class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Your Name</label>
                        <input type="text" id="name" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 text-white placeholder-gray-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                        <input type="email" id="email" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 text-white placeholder-gray-500">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-300 mb-1">Subject</label>
                        <input type="text" id="subject" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 text-white placeholder-gray-500">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-300 mb-1">Message</label>
                        <textarea id="message" rows="5" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500 text-white placeholder-gray-500"></textarea>
                    </div>

                    <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-md text-white font-bold orbitron hover:from-cyan-600 hover:to-blue-700 transition-all transform hover:scale-[1.02] shadow-lg shadow-cyan-500/20">
                        SEND MESSAGE
                    </button>
                </form>
            </div>

            <div>
                <div class="neon-border p-8 rounded-lg bg-gray-900/50 h-full">
                    <h3 class="text-2xl md:text-3xl font-bold mb-6 orbitron text-cyan-400">
                        CONTACT INFORMATION
                    </h3>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-cyan-500/20 flex items-center justify-center text-cyan-400">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-white orbitron">Email</h4>
                                <a href="mailto:alex@nexus.dev" class="text-gray-300 hover:text-cyan-400">sahasujoy.cse@gmail.com</a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-pink-500/20 flex items-center justify-center text-pink-400">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-white orbitron">Phone</h4>
                                <a href="tel:+11234567890" class="text-gray-300 hover:text-pink-400">+880 18 13 09 33 00</a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-purple-500/20 flex items-center justify-center text-purple-400">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-white orbitron">Location</h4>
                                <p class="text-gray-300">Dhaka, Bangladesh</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-400">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-white orbitron">Availability</h4>
                                <p class="text-gray-300">Sunday - Thursday: 9AM - 5PM (GMT+6)</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12">
                        <h4 class="text-lg font-bold text-white orbitron mb-4">CONNECT WITH ME</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="h-12 w-12 rounded-full bg-gray-800 flex items-center justify-center text-gray-300 hover:text-white hover:bg-cyan-500/20 hover:text-cyan-400 transition-all">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                            <a href="#" class="h-12 w-12 rounded-full bg-gray-800 flex items-center justify-center text-gray-300 hover:text-white hover:bg-blue-500/20 hover:text-blue-400 transition-all">
                                <i class="fab fa-linkedin-in text-xl"></i>
                            </a>
                            <a href="#" class="h-12 w-12 rounded-full bg-gray-800 flex items-center justify-center text-gray-300 hover:text-white hover:bg-pink-500/20 hover:text-pink-400 transition-all">
                                <i class="fab fa-dribbble text-xl"></i>
                            </a>
                            <a href="#" class="h-12 w-12 rounded-full bg-gray-800 flex items-center justify-center text-gray-300 hover:text-white hover:bg-purple-500/20 hover:text-purple-400 transition-all">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="h-12 w-12 rounded-full bg-gray-800 flex items-center justify-center text-gray-300 hover:text-white hover:bg-red-500/20 hover:text-red-400 transition-all">
                                <i class="fab fa-youtube text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-12 px-4 sm:px-6 lg:px-8 border-t border-gray-800 bg-gray-900/50">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0">
                <span class="text-2xl font-bold gradient-text orbitron">SUJOY</span>
                <p class="text-gray-400 mt-2">Building the future, one line of code at a time.</p>
            </div>

            <div class="flex flex-col items-center md:items-end">
                <div class="flex space-x-6 mb-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <p class="text-gray-500 text-sm">© 2025 Sujoy. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="back-to-top" class="fixed bottom-8 right-8 h-12 w-12 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center opacity-0 invisible transition-all duration-300 hover:bg-cyan-500/30 hover:text-white">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });

            // Close mobile menu if open
            mobileMenu.classList.add('hidden');
        });
    });

    // Back to top button
    const backToTopButton = document.getElementById('back-to-top');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.remove('opacity-0', 'invisible');
            backToTopButton.classList.add('opacity-100', 'visible');
        } else {
            backToTopButton.classList.remove('opacity-100', 'visible');
            backToTopButton.classList.add('opacity-0', 'invisible');
        }
    });

    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Cursor trail effect
    const cursorTrail = document.querySelector('.cursor-trail');
    let mouseX = 0, mouseY = 0;
    let posX = 0, posY = 0;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });

    function updateCursorTrail() {
        // Calculate new position with easing
        posX += (mouseX - posX) / 10;
        posY += (mouseY - posY) / 10;

        // Apply new position
        cursorTrail.style.left = posX + 'px';
        cursorTrail.style.top = posY + 'px';

        requestAnimationFrame(updateCursorTrail);
    }

    updateCursorTrail();

    // Particle.js effect
    // This would normally be loaded from the particles.js library
    // For demo purposes, we'll just add a simple implementation
    function initParticles() {
        const canvas = document.createElement('canvas');
        canvas.id = 'particles-canvas';
        canvas.style.position = 'absolute';
        canvas.style.top = '0';
        canvas.style.left = '0';
        canvas.style.width = '100%';
        canvas.style.height = '100%';
        canvas.style.zIndex = '-1';
        document.getElementById('particles-js').appendChild(canvas);

        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const particles = [];
        const particleCount = window.innerWidth < 768 ? 30 : 60;

        for (let i = 0; i < particleCount; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                size: Math.random() * 3 + 1,
                speedX: Math.random() * 1 - 0.5,
                speedY: Math.random() * 1 - 0.5,
                color: `rgba(0, 240, 255, ${Math.random() * 0.5 + 0.1})`
            });
        }

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (let i = 0; i < particles.length; i++) {
                const p = particles[i];

                // Update position
                p.x += p.speedX;
                p.y += p.speedY;

                // Wrap around edges
                if (p.x > canvas.width) p.x = 0;
                if (p.x < 0) p.x = canvas.width;
                if (p.y > canvas.height) p.y = 0;
                if (p.y < 0) p.y = canvas.height;

                // Draw particle
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
                ctx.fillStyle = p.color;
                ctx.fill();
            }

            requestAnimationFrame(animateParticles);
        }

        animateParticles();

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    }

    initParticles();

    // Typewriter effect for hero section
    function typeWriterEffect() {
        const heroText = document.querySelector('#home h1');
        const text = heroText.textContent;
        heroText.textContent = '';

        let i = 0;
        function type() {
            if (i < text.length) {
                heroText.textContent += text.charAt(i);
                i++;
                setTimeout(type, 100);
            }
        }

        type();
    }
</script>
</body>
</html>
