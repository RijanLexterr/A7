<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Catalog</title>

    <style>
        /* --- KEEPING YOUR ORIGINAL STYLES --- */
        :root {
            --brand-blue: #005691;
            --hover-blue: #003d66;
        }

        .category-grid {
            display: flex;
            gap: 40px;
            justify-content: center;
            padding: 50px;
            font-family: Arial, sans-serif;
        }

        .category-card {
            background-color: #004a80;
            width: 320px;
            height: 450px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transform: skewX(-15deg); 
            transition: all 0.3s ease;
            border: none;
            box-shadow: 10px 10px 25px rgba(0,0,0,0.5);
        }

        .category-card:hover {
            background-color: var(--hover-blue);
            transform: skewX(-15deg) translateY(-5px);
        }

        .card-content {
            transform: skewX(15deg); 
            display: flex;
            flex-direction: column;
            height: 100%;
            color: white;
            padding: 40px 50px;
            box-sizing: border-box;
        }

        .card-content h3 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            text-align: left;
            line-height: 1.1;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .card-content img {
            width: 140%;
            margin-left: -20%; 
            margin-top: auto;
            margin-bottom: auto;
            filter: drop-shadow(0px 20px 15px rgba(0,0,0,0.6));
        }

        .learn-more {
            font-weight: bold;
            text-decoration: underline;
            font-style: italic;
            font-size: 16px;
            margin-top: 10px;
        }

        .category-card.active {
            outline: 4px solid #ffcc00;
        }

        /* --- NEW MODAL STYLES (Matching your reference image) --- */
        .modal-overlay {
            display: none;
            position: fixed;
            z-index: 10000;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            overflow-y: auto;
        }

        .modal-window {
            background-color: #f4f7f9;
            background-image: linear-gradient(45deg, #ffffff 25%, transparent 25%), 
                              linear-gradient(-45deg, #ffffff 25%, transparent 25%);
            background-size: 60px 60px;
            margin: 2% auto;
            width: 90%;
            max-width: 1200px;
            min-height: 80vh;
            position: relative;
            padding: 40px;
            border-radius: 8px;
            font-family: Arial, sans-serif;
        }

        .modal-header-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 20px;
        }

        .modal-header-area h1 {
            color: #004a80;
            margin: 0;
            font-weight: bold;
        }

        .unit-select {
            padding: 8px 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            min-width: 200px;
        }

        .unit-detail-row {
            background: white;
            margin-bottom: 20px;
            padding: 25px;
            display: grid;
            grid-template-columns: 1.5fr 2fr 1.5fr 1.5fr;
            gap: 20px;
            border-left: 6px solid #004a80;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            align-items: start;
        }

        .unit-detail-row img {
            width: 100%;
            border-radius: 4px;
        }

        .unit-detail-row h4 {
            color: #004a80;
            font-size: 18px;
            margin-top: 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .unit-detail-row p {
            color: #555;
            font-size: 14px;
            line-height: 1.5;
        }

        .close-modal {
            position: absolute;
            top: 15px; right: 25px;
            font-size: 35px;
            cursor: pointer;
            color: #333;
            font-weight: bold;
        }

        .get-quote-btn {
            background: #004a80;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
            width: 100%;
        }

        .get-quote-btn:hover {
            background-color: #003d66;
        }

        .modal-header-area {
    position: sticky;
    top: -40px; /* Adjust based on your modal padding */
    background-color: #f4f7f9;
    z-index: 10;
    padding-top: 20px;
}
    </style>
</head>
<body>
    <?php require 'headertemplate.php'; ?>

    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">Equipment Catalog</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Equipment Catalog</li>
                </ol>
            </nav>
        </div>
    </div>

     <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-5 mb-4">Heavy Hauling Transport</h1>
            </div>
    <div class="category-grid">
        <div class="category-card" onclick="openEquipmentModal('trucks')">
            <div class="card-content">
                <h3>Trucks<br>Transport</h3>
                <img src="./img/equipmentcatalog/categories/Trucks3.png" alt="Truck">
                <span class="learn-more">Learn More</span>
            </div>
        </div>

        <div class="category-card" onclick="openEquipmentModal('bulldozer')">
            <div class="card-content">
                <h3>Bulldozer<br>Transport</h3>
                <img src="./img/equipmentcatalog/categories/Bulldozer1.png" alt="Bulldozer">
                <span class="learn-more">Learn More</span>
            </div>
        </div>

        <div class="category-card" onclick="openEquipmentModal('excavator')">
            <div class="card-content">
                <h3>Excavator<br>Transport</h3>
                <img src="./img/equipmentcatalog/categories/Excavator2.png" alt="Excavator">
                <span class="learn-more">Learn More</span>
            </div>
        </div>
    </div>

    <div id="equipmentModal" class="modal-overlay">
        <div class="modal-window">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <div class="modal-header-area">
                <h1 id="modal-category-title">CATEGORY TITLE</h1>
                <select class="unit-select">
                    <option>Select Unit</option>
                </select>
            </div>
            <div id="equipment-list-container">
                </div>
        </div>
    </div>
     <script src="script/categories.js"></script>

    <?php require 'footertemplate.php'; ?>
</body>
</html>