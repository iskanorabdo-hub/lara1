<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Gestion des Parkings | Administration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #e8f0ff 0%, #d9e6f5 100%);
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            padding: 2rem;
            min-height: 100vh;
        }

        /* Conteneur principal */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 1.75rem;
            padding: 2rem;
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15), 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* En-tête */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 2rem;
            gap: 1rem;
        }

        .title-section h1 {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #1e3a5f, #2c5a8c);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .title-section h1::before {
            content: "🅿️";
            font-size: 2rem;
            background: none;
            -webkit-background-clip: unset;
            color: #2c5a8c;
        }

        .stats-badge {
            background: white;
            padding: 0.5rem 1.25rem;
            border-radius: 60px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e5a8a;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(44, 90, 140, 0.2);
        }

        /* Formulaire de recherche moderne */
        .search-wrapper {
            background: white;
            border-radius: 1.25rem;
            padding: 0.25rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2edf7;
        }

        .search-form {
            display: flex;
            gap: 0.75rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-input {
            flex: 1;
            padding: 0.85rem 1.25rem;
            border: none;
            font-size: 0.95rem;
            border-radius: 1rem;
            background: #f9fcff;
            transition: all 0.2s;
            font-family: inherit;
            color: #1e2f3e;
        }

        .search-input:focus {
            outline: none;
            background: white;
            box-shadow: 0 0 0 3px rgba(44, 90, 140, 0.1);
        }

        .search-input::placeholder {
            color: #9bb7d0;
        }

        .search-btn {
            background: linear-gradient(135deg, #2c5a8c, #1e3a5f);
            border: none;
            padding: 0.85rem 2rem;
            border-radius: 1rem;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: inherit;
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30, 58, 95, 0.3);
            background: linear-gradient(135deg, #1e4a7a, #163a5c);
        }

        /* Table stylisée */
        .modern-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 1rem;
            overflow: hidden;
            background: white;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }

        .modern-table th {
            background: #0f2b3d;
            color: #f0f9ff;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1rem 1.25rem;
            text-align: left;
        }

        .modern-table td {
            padding: 1rem 1.25rem;
            font-size: 0.95rem;
            color: #1e293b;
            border-bottom: 1px solid #eef2f8;
            background-color: white;
            transition: all 0.2s;
        }

        .modern-table tr:last-child td {
            border-bottom: none;
        }

        .modern-table tbody tr:hover td {
            background-color: #f8fcff;
            transform: scale(1.001);
        }

        /* Lien ID */
        .id-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #eef4ff;
            color: #1e5a8a;
            font-weight: 700;
            text-decoration: none;
            padding: 0.4rem 1rem;
            border-radius: 40px;
            font-size: 0.85rem;
            transition: all 0.2s;
            border: 1px solid #cce3ff;
        }

        .id-link:hover {
            background: #1e5a8a;
            color: white;
            border-color: #1e5a8a;
            transform: translateY(-1px);
        }

        /* Badges pour les valeurs */
        .capacite-badge {
            background: #e6f7e6;
            color: #2d6a4f;
            padding: 0.25rem 0.8rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
        }

        .prix-badge {
            background: #fff0db;
            color: #c97e00;
            padding: 0.25rem 0.8rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
        }

        /* Actions */
        .actions-group {
            display: flex;
            gap: 0.6rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn-modify {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            padding: 0.45rem 1.1rem;
            border-radius: 40px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            border: none;
            cursor: pointer;
        }

        .btn-modify:hover {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
        }

        .btn-delete {
            background: white;
            color: #dc2626;
            border: 1.5px solid #fecaca;
            padding: 0.45rem 1.1rem;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-family: inherit;
        }

        .btn-delete:hover {
            background: #dc2626;
            color: white;
            border-color: #dc2626;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
        }

        /* Message vide */
        .empty-row td {
            text-align: center;
            padding: 3rem;
            color: #7c8ba0;
            font-size: 1rem;
            background: #fafdff;
        }

        /* Pagination stylisée */
        .pagination-wrapper {
            margin-top: 1.5rem;
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper nav {
            display: inline-block;
        }

        .pagination-wrapper .pagination {
            display: flex;
            gap: 0.5rem;
            list-style: none;
            flex-wrap: wrap;
            justify-content: center;
        }

        .pagination-wrapper .pagination li {
            display: inline-block;
        }

        .pagination-wrapper .pagination a,
        .pagination-wrapper .pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 0.9rem;
            background: white;
            color: #2c5a8c;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            transition: all 0.2s;
            border: 1px solid #dce7f0;
            min-width: 38px;
        }

        .pagination-wrapper .pagination a:hover {
            background: #2c5a8c;
            color: white;
            border-color: #2c5a8c;
            transform: translateY(-1px);
        }

        .pagination-wrapper .pagination .active span {
            background: #2c5a8c;
            color: white;
            border-color: #2c5a8c;
            box-shadow: 0 2px 6px rgba(44, 90, 140, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .container {
                padding: 1.25rem;
            }

            .modern-table th,
            .modern-table td {
                padding: 0.75rem;
            }

            .actions-group {
                flex-direction: column;
                align-items: flex-start;
            }

            .title-section h1 {
                font-size: 1.5rem;
            }

            .search-form {
                flex-direction: column;
            }

            .search-btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* Animation d'entrée */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modern-table tbody tr {
            animation: fadeUp 0.25s ease forwards;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="page-header">
        <div class="title-section">
            <h1>Liste Parking</h1>
        </div>
        <div class="stats-badge">
            🚗 @if(isset($parkinges) && count($parkinges) > 0) {{ $parkinges->total() ?? count($parkinges) }} @else 0 @endif parking(s) actif(s)
        </div>
    </div>

    <!-- Barre de recherche améliorée -->
    <div class="search-wrapper">
        <form method="GET" action="{{ route('liste-parking') }}" class="search-form">
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}" 
                   placeholder="🔍 Rechercher par ville ..." 
                   class="search-input">
            <button type="submit" class="search-btn">
                <span>Rechercher</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </form>
    </div>

    <!-- Tableau des parkings -->
    <table class="modern-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>📍 Ville</th>
                <th>🏢 Capacité</th>
                <th>💰 Prix / heure</th>
                <th>⚙️ Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($parkinges as $v)
        <tr>
            <td data-label="ID">
                <a href="{{ route('showp', $v->id) }}" class="id-link">
                    🔍 {{ $v->id }}
                </a>
            </td>
            <td data-label="Ville" style="font-weight: 600; color: #1e3a5f;">{{ $v->ville }}</td>
            <td data-label="Capacité">
                <span class="capacite-badge">🚘 {{ number_format($v->capacite, 0, ',', ' ') }} places</span>
            </td>
            <td data-label="Prix">
                <span class="prix-badge">{{ number_format($v->prix_heure, 2, ',', ' ') }} € / h</span>
            </td>
            <td data-label="Actions">
                <div class="actions-group">
                    <a href="{{ route('modifierparking', $v->id) }}" class="btn-modify">
                        ✏️ Modifier
                    </a>
                    <form action="{{ route('supprimerparking', $v->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Supprimer définitivement ce parking ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            🗑️ Supprimer
                        </button>
                    </form>
                </div>
             </td>
        </tr>
        @empty
        <tr class="empty-row">
            <td colspan="5">
                🕊️ Aucun parking trouvé pour "<strong>{{ request('search') ?: 'la recherche' }}</strong>"<br>
                <span style="font-size: 0.8rem;">Essayez une autre ville ou réinitialisez la recherche.</span>
             </td>
         </tr>
        @endforelse
        </tbody>
    </table>

    <!-- Pagination stylisée (Laravel) -->
    @if(isset($parkinges) && method_exists($parkinges, 'links') && $parkinges->hasPages())
        <div class="pagination-wrapper">
            {{ $parkinges->links() }}
        </div>
    @elseif(isset($parkinges) && count($parkinges) > 0 && !method_exists($parkinges, 'links'))
        <!-- fallback si pas de pagination officielle, on n'affiche rien -->
    @endif
</div>
</body>
</html>