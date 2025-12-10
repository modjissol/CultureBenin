

<!DOCTYPE html>
<html lang="fr">
@php
	$bgUrl = asset('adminlte/img/enf.jpg');
@endphp
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
	<style>
		.main-layout {
			background: url('{{ $bgUrl }}') center center/cover no-repeat;
			border-radius: 16px;
			min-height: 400px;
		}
		body {
			font-family: 'Montserrat', Arial, sans-serif;
			margin: 0;
			background: #fff;
		}
		.content {
		flex: 1;
		padding: 0;
		}
		.main-title {
			font-size: 4rem;
			font-weight: bold;
			margin-top: 0;
			margin-bottom: 20px;
		}
		.main-desc {
			font-size: 1.3rem;
			margin-bottom: 40px;
			max-width: 600px;
		}
		.headline-row {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
		}
		.headline-row .blue-bar {
			width: 60px;
			height: 16px;
			background: #0000ff;
			margin-right: 10px;
		}
		.headline-row .headline-title {
			font-size: 2.5rem;
			font-weight: bold;
		}
		.headline-row .articles-link {
			margin-left: auto;
			font-size: 1.2rem;
			font-weight: bold;
			display: flex;
			align-items: center;
		}
		.headline-row .plus {
			background: #0000ff;
			color: #fff;
			font-size: 2rem;
			width: 32px;
			height: 32px;
			display: flex;
			align-items: center;
			justify-content: center;
			margin-left: 10px;
			border-radius: 4px;
		}
		.gallery-section {
			display: flex;
			gap: 20px;
			margin-top: 20px;
		}
		.gallery-img {
			width: 700px;
			height: 260px;
			object-fit: cover;
			border-radius: 6px;
			box-shadow: 0 2px 8px rgba(0,0,0,0.08);
		}
				       .header {
					       width: 100%;
					       background: #0a2840;
					       color: #fff;
					       display: flex;
					       align-items: center;
					       justify-content: space-between;
					       padding: 0 40px;
					       height: 90px;
					       box-sizing: border-box;
					       position: fixed;
					       top: 0;
					       left: 0;
					       z-index: 1000;
					       box-shadow: 0 2px 8px rgba(0,0,0,0.08);
				       }
			       .header-left {
				       display: flex;
				       align-items: center;
				       flex: 1 1 0;
				       min-width: 0;
			       }
			       .header-logo {
				       height: 60px;
				       margin-right: 18px;
			       }
			       .header-title {
				       font-size: 1.2rem;
				       font-weight: bold;
				       line-height: 1.2;
				       margin-right: 40px;
				       white-space: nowrap;
			       }
			       .header-nav {
				       display: flex;
				       gap: 32px;
				       flex: 1 1 0;
				       justify-content: center;
				       align-items: center;
				       min-width: 0;
			       }
			       .header-nav a {
				       color: #fff;
				       text-decoration: none;
				       font-weight: bold;
				       font-size: 1.15rem;
				       transition: color 0.2s;
				       padding: 4px 0;
				       position: relative;
			       }
			       .header-nav a:hover {
				       color: #ffd600;
			       }
			       .header-actions {
				       display: flex;
				       align-items: center;
				       gap: 18px;
				       margin-left: 40px;
			       }
			.header-btn {
				background: #ffd600;
				color: #0a2840;
				border: none;
				border-radius: 30px;
				padding: 10px 28px;
				font-weight: bold;
				font-size: 1.1rem;
				cursor: pointer;
				margin-right: 10px;
			}
			.header-search {
				background: #fff;
				border-radius: 50%;
				width: 38px;
				height: 38px;
				display: flex;
				align-items: center;
				justify-content: center;
				margin-right: 10px;
			}
			.header-lang {
				background: #0a2840;
				color: #fff;
				border: 2px solid #fff;
				border-radius: 8px;
				padding: 6px 18px;
				font-weight: bold;
				font-size: 1rem;
				cursor: pointer;
			}
		   body {
				   padding-top: 90px;
		   }
		   </style>
	   </head>
	   <body>
		   <header class="header">
			   <div class="header-left">
				   <img src="{{ asset('adminlte/img/benin-logo.png') }}" alt="Logo Benin" class="header-logo">
				   <div class="header-title">
				   </div>
				   <nav class="header-nav">
				   </nav>
			   </div>
			   <div class="header-actions">
				   <button class="header-btn">Mon espace</button>
				   <div class="header-search">
					   <svg width="20" height="20" fill="#0a2840" viewBox="0 0 20 20"><circle cx="9" cy="9" r="7" stroke="#0a2840" stroke-width="2" fill="none"/><line x1="15" y1="15" x2="19" y2="19" stroke="#0a2840" stroke-width="2"/></svg>
				   </div>
				   <button class="header-lang">FR</button>
			   </div>
		   </header>
	  <!-- Bloc vertical 'Culture Benin' supprimé -->
	<div class="main-layout" style="background: url('{{ asset('adminlte/img/enf.jpg') }}') center center/cover no-repeat; border-radius: 16px; min-height: 400px;">
		   <div class="content-row" style="display: flex; align-items: flex-start; gap: 40px;">
			   <div class="content" style="flex: 1; display: flex; align-items: flex-start; gap: 40px; background: rgba(255,255,255,0.85); border-radius: 16px; padding: 32px;">
				   <div style="flex: 1;">
					   <h1 class="main-title">Explorez la culture comme jamais !</h1>
					   <div class="main-desc">
						   Culture Benin, le média en ligne de référence pour tous les passionnés d’art, d’archéologie et de bibliophilie. Sous l’égide des Éditions Faton et à travers le prisme de ses magazines emblématiques, élargissez vos connaissances et découvrez l’actualité culturelle autrement.
					   </div>
					   <div class="headline-row">
						   <div class="blue-bar"></div>
						   <div class="headline-title">À la une</div>
						   <div class="articles-link">Voir tous les articles <span class="plus">+</span></div>
					   </div>
				   </div>
				   <div class="side-image">
					   <img src="{{ asset('adminlte/img/tri.jpg') }}" alt="Illustration culture" style="width:400px; height:auto; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.08);">
				   </div>
			   </div>
		   </div>
		   <div class="gallery-section">
			   <img src="{{ asset('img/photo4.jpg') }}" alt="Galerie culture" class="gallery-img">
		   </div>
	   </div>
</body>
</html>
