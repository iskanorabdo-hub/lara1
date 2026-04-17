<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Gestion des véhicules | Catalogue</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fc 0%, #e9eef5 100%);
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            padding: 2rem;
            min-height: 100vh;
        }

        /* Conteneur principal élégant */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(2px);
            border-radius: 2rem;
            padding: 1.5rem;
            box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.25), 0 2px 5px rgba(0, 0, 0, 0.02);
        }

        /* En-tête de page */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            flex-wrap: wrap;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(59, 130, 246, 0.2);
        }

        .page-header h1 {
            font-size: 1.85rem;
            font-weight: 600;
            background: linear-gradient(135deg, #1e293b, #2d3a5e);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            letter-spacing: -0.3px;
        }

        .badge-stats {
            background: white;
            padding: 0.4rem 1rem;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #1e40af;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        /* Table stylisée */
        .modern-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 1.25rem;
            overflow: hidden;
            background: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .modern-table th {
            background: #0f172a;
            color: #f1f5f9;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 1rem 1.25rem;
            text-align: left;
            border-bottom: 2px solid #2d3a5e;
        }

        .modern-table td {
            padding: 1rem 1.25rem;
            font-size: 0.95rem;
            color: #1e293b;
            border-bottom: 1px solid #e2e8f0;
            background-color: white;
            transition: all 0.2s ease;
        }

        .modern-table tr:last-child td {
            border-bottom: none;
        }

        /* Effet hover sur les lignes */
        .modern-table tbody tr:hover td {
            background-color: #f8fafd;
            transform: scale(1.002);
            box-shadow: inset 0 0 0 1px rgba(59, 130, 246, 0.2);
        }

        /* Lien ID (bouton/puce) */
        .id-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #eff6ff;
            color: #1e40af;
            font-weight: 600;
            text-decoration: none;
            padding: 0.35rem 0.9rem;
            border-radius: 40px;
            font-size: 0.85rem;
            transition: all 0.2s;
            border: 1px solid #bfdbfe;
            width: fit-content;
            min-width: 48px;
        }

        .id-link:hover {
            background: #1e40af;
            color: white;
            border-color: #1e40af;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Style spécifique pour les colonnes */
        .col-marque {
            font-weight: 600;
            color: #0f172a;
        }

        .col-model {
            font-family: 'SF Mono', 'JetBrains Mono', monospace;
            font-size: 0.9rem;
            background: #f1f5f9;
            padding: 0.2rem 0.6rem;
            border-radius: 20px;
            display: inline-block;
        }

        .col-km {
            font-feature-settings: "tnum";
            font-variant-numeric: tabular-nums;
            font-weight: 500;
            color: #2c3e66;
        }

        /* message si aucun véhicule */
        .empty-message {
            text-align: center;
            padding: 3rem 1rem;
            background: white;
            border-radius: 1.25rem;
            color: #64748b;
            font-size: 1rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
        }

        /* footer léger */
        .table-footer {
            margin-top: 1.5rem;
            display: flex;
            justify-content: flex-end;
            font-size: 0.8rem;
            color: #475569;
        }

        /* responsive */
        @media (max-width: 680px) {
            body {
                padding: 1rem;
            }

            .modern-table th,
            .modern-table td {
                padding: 0.75rem 0.8rem;
            }

            .page-header h1 {
                font-size: 1.4rem;
            }

            .col-model {
                font-size: 0.8rem;
                white-space: nowrap;
            }

            .id-link {
                padding: 0.25rem 0.6rem;
                font-size: 0.75rem;
            }
        }

        /* animations subtiles */
        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modern-table tbody tr {
            animation: fadeSlide 0.2s ease forwards;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>🚗 Parc automobile</h1>
        <div class="badge-stats">
            📊 {{ count($voitures) }} véhicule(s) enregistré(s)
        </div>
    </div>

    @if(count($voitures) > 0)
        <table class="modern-table">
            <thead>
            <tr>
                <th>ID · Détail</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Kilométrage (km)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($voitures as $v)
            <tr>
                <td data-label="ID">
                    <a href="{{ route('show' , $v->id) }}" class="id-link">
                        🔍 {{ $v->id }}
                    </a>
                </td>
                <td class="col-marque" data-label="Marque">{{ $v->marque }}</td>
                <td data-label="Modèle"><span class="col-model">{{ $v->model }}</span></td>
                <td class="col-km" data-label="Km">{{ number_format($v->km, 0, ',', ' ') }} km</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="table-footer">
            <span>✨ Cliquez sur un ID pour voir la fiche détaillée</span>
        </div>
    @else
        <div class="empty-message">
            🕊️ Aucun véhicule disponible pour le moment.<br>
            <span style="font-size:0.85rem">Ajoutez des voitures à votre base de données.</span>
        </div>
    @endif
</div>
</body>
</html>