<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PNC Navigator - Pencarian Ruangan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --primary: #4361ee; --secondary: #3a0ca3; --accent: #7209b7;
            --light: #f8f9fa; --dark: #212529; --success: #4cc9f0;
            --text-light: rgba(255, 255, 255, 0.8);
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--light); line-height: 1.6; min-height: 100vh;
        }
        .navbar {
            background: rgba(255, 255, 255, 0.95); padding: 1rem 2rem;
            position: fixed; top: 0; width: 100%; z-index: 1000;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        .nav-container {
            max-width: 1200px; margin: 0 auto;
            display: flex; justify-content: space-between; align-items: center;
        }
        .logo {
            font-size: 1.8rem; font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .nav-menu { display: flex; list-style: none; gap: 2rem; align-items: center; }
        .nav-menu a {
            color: var(--dark); text-decoration: none; font-weight: 600;
            padding: 0.5rem 1rem; border-radius: 25px; transition: all 0.3s ease;
        }
        .nav-menu a:hover, .nav-menu a.active {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white; transform: translateY(-2px);
        }
        .search-box {
            display: flex; background: white; border-radius: 50px; padding: 0.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); border: 2px solid transparent;
            transition: all 0.3s ease;
        }
        .search-box:focus-within { border-color: var(--primary); transform: scale(1.02); }
        .search-box input {
            border: none; padding: 0.5rem 1rem; border-radius: 25px; outline: none;
            width: 250px; font-size: 0.9rem;
        }
        .search-box button {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border: none; color: white; padding: 0.5rem 1.5rem; border-radius: 25px;
            cursor: pointer; transition: all 0.3s ease; font-weight: 600;
        }
        .container { max-width: 1200px; margin: 100px auto 2rem; padding: 0 2rem; }
        .search-hero {
            background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px);
            border-radius: 20px; padding: 2.5rem; margin-bottom: 2rem; text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .search-input-group { display: flex; max-width: 700px; margin: 0 auto 1.5rem; }
        .search-input {
            flex: 1; padding: 1rem 1.5rem; border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px 0 0 25px; font-size: 1rem; outline: none;
            background: rgba(255, 255, 255, 0.9); color: var(--dark);
        }
        .search-btn {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white; border: none; padding: 0 2rem; border-radius: 0 25px 25px 0;
            cursor: pointer; font-weight: 600;
        }
        .search-results { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2rem; }
        .result-card {
            background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(20px);
            border-radius: 20px; overflow: hidden; transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .result-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .card-image {
            height: 160px; background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex; align-items: center; justify-content: center; color: white;
            font-size: 3rem; position: relative;
        }
        .card-content { padding: 1.5rem; }
        .card-title { font-size: 1.3rem; font-weight: 700; margin-bottom: 0.8rem; color: white; }
        .card-description { color: var(--text-light); margin-bottom: 1rem; }
        .card-meta { 
            color: var(--text-light); font-size: 0.9rem; 
            display: flex; justify-content: space-between; align-items: center;
        }
        .empty-results {
            text-align: center; padding: 3rem; background: rgba(255, 255, 255, 0.1);
            border-radius: 20px; margin-top: 2rem;
        }
        .suggestion-buttons {
            margin-top: 1rem; display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap;
        }
        .suggestion-btn {
            background: rgba(255,255,255,0.2); border: none; padding: 0.5rem 1rem; 
            border-radius: 20px; color: white; cursor: pointer; transition: all 0.3s ease;
        }
        .suggestion-btn:hover {
            background: rgba(255,255,255,0.3); transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo"><i class="fas fa-map-marked-alt"></i> PNC NAVIGATOR</div>
            <ul class="nav-menu">
                <li><a href="/"><i class="fas fa-home"></i> Beranda</a></li>
                <li><a href="/search" class="active"><i class="fas fa-compass"></i> Eksplor</a></li>
                <li><a href="/tentang"><i class="fas fa-info-circle"></i> Tentang</a></li>
            </ul>
            <div class="search-box">
                <input type="search" id="navbarSearch" placeholder="Cari ruangan...">
                <button onclick="searchFromNavbar()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="search-hero">
            <h2>Temukan Ruangan & Fasilitas Kampus</h2>
            <p>Cari ruangan kelas, laboratorium, perpustakaan, atau fasilitas lainnya</p>
            <div class="search-input-group">
                <input type="text" class="search-input" id="searchInput" placeholder="Cari ruangan, fasilitas, atau lokasi..." value="">
                <button class="search-btn" onclick="performSearch()"><i class="fas fa-search"></i> Cari</button>
            </div>
            <div class="suggestion-buttons">
                <button class="suggestion-btn" onclick="searchSuggestion('ruang kelas')">Ruang Kelas</button>
                <button class="suggestion-btn" onclick="searchSuggestion('laboratorium')">Laboratorium</button>
                <button class="suggestion-btn" onclick="searchSuggestion('perpustakaan')">Perpustakaan</button>
                <button class="suggestion-btn" onclick="searchSuggestion('kantin')">Kantin</button>
            </div>
        </div>

        <div class="search-results" id="searchResults">
            <!-- Hasil akan muncul di sini dari database -->
            @foreach($rooms as $room)
            <div class="result-card" onclick="showRoomDetail({{ $room->id }})">
                <div class="card-image">
                    <i class="{{ $room->icon ?? 'fas fa-door-open' }}"></i>
                </div>
                <div class="card-content">
                    <h3 class="card-title">{{ $room->name }}</h3>
                    <p class="card-description">{{ $room->description ?? 'Tidak ada deskripsi' }}</p>
                    <div class="card-meta">
                        <span><i class="fas fa-building"></i> {{ $room->building }}</span>
                        <span><i class="fas fa-layer-group"></i> {{ $room->floor }}</span>
                        <span><i class="fas fa-users"></i> {{ $room->capacity }} orang</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="empty-results" id="emptyResults" style="display: none;">
            <h3>😔 Tidak ada hasil yang ditemukan</h3>
            <p>Coba gunakan kata kunci yang berbeda atau lihat saran pencarian di atas</p>
        </div>
    </main>

    <script>
        // DATA RUANGAN DARI DATABASE (PHP ke JavaScript)
        const rooms = @json($rooms);

        // FUNGSI PENCARIAN
        function performSearch() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
            const resultsContainer = document.getElementById('searchResults');
            const emptyResults = document.getElementById('emptyResults');
            
            resultsContainer.innerHTML = '';
            
            if (!searchTerm) {
                displayAllRooms();
                emptyResults.style.display = 'none';
                return;
            }

            const filteredRooms = rooms.filter(room => 
                room.name.toLowerCase().includes(searchTerm) ||
                (room.description && room.description.toLowerCase().includes(searchTerm)) ||
                (room.type && room.type.toLowerCase().includes(searchTerm)) ||
                room.building.toLowerCase().includes(searchTerm) ||
                room.floor.toLowerCase().includes(searchTerm)
            );

            if (filteredRooms.length === 0) {
                emptyResults.style.display = 'block';
                resultsContainer.innerHTML = '';
            } else {
                emptyResults.style.display = 'none';
                filteredRooms.forEach(room => {
                    const roomCard = createRoomCard(room);
                    resultsContainer.innerHTML += roomCard;
                });
            }
        }

        function displayAllRooms() {
            const resultsContainer = document.getElementById('searchResults');
            resultsContainer.innerHTML = '';
            
            rooms.forEach(room => {
                const roomCard = createRoomCard(room);
                resultsContainer.innerHTML += roomCard;
            });
        }

        function createRoomCard(room) {
            const icon = getRoomIcon(room.type);
            
            return `
                <div class="result-card" onclick="showRoomDetail(${room.id})">
                    <div class="card-image">
                        <i class="${icon}"></i>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">${room.name}</h3>
                        <p class="card-description">${room.description || 'Tidak ada deskripsi'}</p>
                        <div class="card-meta">
                            <span><i class="fas fa-building"></i> ${room.building}</span>
                            <span><i class="fas fa-layer-group"></i> ${room.floor}</span>
                            <span><i class="fas fa-users"></i> ${room.capacity} orang</span>
                        </div>
                    </div>
                </div>
            `;
        }

        function getRoomIcon(type) {
            const icons = {
                'classroom': 'fas fa-chalkboard',
                'lab': 'fas fa-laptop-code', 
                'library': 'fas fa-book',
                'office': 'fas fa-users',
                'facility': 'fas fa-utensils',
                'auditorium': 'fas fa-theater-masks',
                'meeting': 'fas fa-comments'
            };
            return icons[type] || 'fas fa-door-open';
        }

        function searchFromNavbar() {
            const searchTerm = document.getElementById('navbarSearch').value;
            document.getElementById('searchInput').value = searchTerm;
            performSearch();
        }

        function searchSuggestion(term) {
            document.getElementById('searchInput').value = term;
            performSearch();
        }

        function showRoomDetail(roomId) {
            window.location.href = `/rooms/${roomId}`;
        }

        // Enter key support
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') performSearch();
        });
        
        document.getElementById('navbarSearch').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') searchFromNavbar();
        });
    </script>
</body>
</html>