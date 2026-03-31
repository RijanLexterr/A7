<!DOCTYPE html>
<html lang="en">

<?php require 'headertemplate.php'; ?>

<style>
    /* Global Styles for the Dark Section */
    .gallery-section {
        background-color: #343a40;
        color: #ffffff;
        padding: 60px 0;
    }

    /* Filter Button Styling */
    .filter-menu {
        text-align: center;
        margin-bottom: 40px;
    }
    .filter-btn {
        cursor: pointer;
        padding: 12px 30px;
        margin: 5px;
        border: 2px solid #F8D838;
        background: transparent;
        color: #050404;
        font-weight: 600;
        transition: all 0.3s ease;
        border-radius: 50px;
    }
    .filter-btn.active, .filter-btn:hover {
        background: #F8D838;
        color: #fff;
        box-shadow: 0 4px 15px rgba(254, 93, 55, 0.4);
    }

    /* Gallery Item Logic */
    .gallery-item.hide {
        display: none !important; 
    }
    
    .project-card {
        background: #f8f9fa;
        border-radius: 8px;
        overflow: hidden;
   
        margin-bottom: 35px; 
        height: calc(100% - 35px); 
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        transition: transform 0.3s ease;
    }

    .project-card:hover {
        transform: translateY(-5px); /* Optional: adds a slight lift on hover */
    }

    .project-card img {
        width: 100%;
        height: 250px; 
        object-fit: cover;
        display: block;
    }

    .caption {
        padding: 15px;
        color: #333;
        font-weight: 500;
        text-align: center;
        background: #fff;
    }

    /* Smooth Fade Animation */
    .gallery-item.show {
        animation: fadeIn 0.5s ease forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }

.gallery-item{
    background-color: transparent !important;
}
</style>

<body class="bg-dark">
    <div class="gallery-section">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-white">Explore Our Heavy Equipment Fleet</h1>
            </div>

            <div class="filter-menu">
                <button class="filter-btn active" data-filter="all">All Projects</button>
                <button class="filter-btn" data-filter="trucks">Trucks</button>
                <button class="filter-btn" data-filter="bulldozer">Bulldozers</button>
            </div>

            <div class="row g-4" id="gallery-grid">
                <div class="col-lg-3 col-md-6 gallery-item bulldozer show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Bulldozer/651901776_4209519825973609_6437340701431109741_n.jpg"><div class="caption">Bulldozer Unit 1</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item bulldozer show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Bulldozer/659029423_752292474487918_7039981739803273036_n.jpg"><div class="caption">Bulldozer Unit 2</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item bulldozer show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Bulldozer/655274188_782402084602224_5329138535872013539_n.jpg"><div class="caption">Bulldozer Unit 3</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item bulldozer show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Bulldozer/652739421_1448789470325343_3930862270811786554_n.jpg"><div class="caption">Bulldozer Unit 4</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item bulldozer show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Bulldozer/654365048_3443767425772096_454726511502435370_n.jpg"><div class="caption">Bulldozer Unit 5</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item bulldozer show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Bulldozer/655171953_4400195606972806_8336303907875827476_n.jpg"><div class="caption">Bulldozer Unit 6</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item bulldozer show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Bulldozer/659726186_4445571869059311_219560017586572443_n.jpg"><div class="caption">Bulldozer Unit 7</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item bulldozer show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Bulldozer/653809507_785696160889629_5217017849474593867_n.jpg"><div class="caption">Bulldozer Unit 8</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item bulldozer show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Bulldozer/655191211_1563714621366146_1141032871636098971_n.jpg"><div class="caption">Bulldozer Unit 9</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item bulldozer show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Bulldozer/653834543_4412166759072825_8147844889670856743_n.JPG"><div class="caption">Bulldozer Unit 10</div></div>
                </div>

                <div class="col-lg-3 col-md-6 gallery-item trucks show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Trucks/658985344_1634677104089417_2744807182855787149_n.jpg"><div class="caption">Truck Unit 1</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item trucks show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Trucks/461055332_1557776181782226_6506807053802612864_n.jpg"><div class="caption">Truck Unit 2</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item trucks show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Trucks/462576050_2874257402778963_3117141770811188863_n.jpg"><div class="caption">Truck Unit 3</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item trucks show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Trucks/655666709_1084572513880303_7853607595254985515_n.jpg"><div class="caption">Truck Unit 4</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item trucks show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Trucks/653801600_1910754536237602_8560765101893494250_n.jpg"><div class="caption">Truck Unit 5</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item trucks show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Trucks/653765689_1183725430366112_6031211004507062559_n.jpg"><div class="caption">Truck Unit 6</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item trucks show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Trucks/658808181_983877477413077_939188699834384718_n.jpg"><div class="caption">Truck Unit 7</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item trucks show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Trucks/658985344_1634677104089417_2744807182855787149_n.jpg"><div class="caption">Truck Unit 8</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item trucks show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Trucks/461055332_1557776181782226_6506807053802612864_n.jpg"><div class="caption">Truck Unit 9</div></div>
                </div>
                <div class="col-lg-3 col-md-6 gallery-item trucks show">
                    <div class="project-card"><img src="IMG/frommessenger_img/Trucks/653741205_1650177919468981_5671678125654794014_n.jpg"><div class="caption">Truck Unit 10</div></div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'footertemplate.php'; ?>

    <script>
        // Ensure script runs AFTER the page loads
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-item');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // 1. Remove active class from all buttons and add to current
                    filterBtns.forEach(button => button.classList.remove('active'));
                    btn.classList.add('active');

                    // 2. Get the filter category
                    const filterValue = btn.getAttribute('data-filter');

                    // 3. Filter the images
                    galleryItems.forEach(item => {
                        if (filterValue === 'all' || item.classList.contains(filterValue)) {
                            item.classList.remove('hide');
                            item.classList.add('show');
                        } else {
                            item.classList.add('hide');
                            item.classList.remove('show');
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>