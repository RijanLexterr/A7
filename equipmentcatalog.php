<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>\


    <style>
/* Container Layout */
.equipment-gallery {
    padding: 40px 2%;
    max-width: 1600px; /* Increased to allow 5 cards across */
    margin: 0 auto;
}

.section-title {
    text-align: center;
    margin-bottom: 40px;
    font-size: 2.5rem;
    color: #333;
}

.equipment-grid {
    display: grid;
    gap: 20px;
    /* minmax(250px, 1fr) allows cards to shrink to 250px. 
       On a 1600px screen, this will naturally fit 5-6 cards.
    */
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
}

/* Card Styling */
.equipment-card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
}

.equipment-card:hover {
    transform: translateY(-5px);
}

.image-container img {
    width: 100%;
    height: 180px; /* Reduced height to keep cards proportional when narrow */
    object-fit: cover;
}

.content {
    padding: 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.content h3 {
    margin: 0 0 15px 0;
    color: #2c3e50;
    font-size: 1.5rem;
}

.content p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}

/* Button Styling */
.inquiry-btn {
    display: inline-block;
    background-color: #f39c12; /* Industrial Yellow */
    color: #fff;
    padding: 12px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    text-align: center;
    transition: background 0.3s ease;
}

.inquiry-btn:hover {
    background-color: #e67e22;
}

@media (min-width: 1400px) {
    .equipment-grid {
        grid-template-columns: repeat(5, 1fr);
    }
}

/* Video Overlay Styling */
.video-card { cursor: pointer; position: relative; }

.play-overlay {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background 0.3s;
}

.play-icon {
    font-size: 50px;
    color: white;
    text-shadow: 0 0 10px rgba(0,0,0,0.5);
}

.video-card:hover .play-overlay {
    background: rgba(0, 0, 0, 0.1);
}

/* Modal Background */
.modal {
    display: none; 
    position: fixed;
    z-index: 1000;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.9);
}

/* Modal Content (Video Container) */
.modal-content {
    position: relative;
    margin: auto;
    top: 50%;
    transform: translateY(-50%);
    width: 80%;
    max-width: 800px;
}

#modalVideo {
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
}

/* Close Button */
.close-modal {
    position: absolute;
    top: 20px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
}


.brand-label {
  display: inline-block;
  color: #666;
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 1.5px;
  margin-bottom: 4px;
  text-transform: uppercase;
}

/* The striking Title */
.model-title {
  color: #1a2b3c;
  font-size: 2.2rem;
  font-weight: 800;
  margin: 0 0 16px 0;
  line-height: 1.1;
}

/* Decorative Divider */
.divider {
  border: 0;
  height: 4px;
  width: 50px;
  background: #FFCD00; /* Caterpillar Yellow */
  margin: 0 0 20px 0;
}

/* Body Text */
.description {
  color: #4a5568;
  font-size: 1.1rem;
  line-height: 1.6;
  margin-bottom: 24px;
}

.description strong {
  color: #1a2b3c;
}

/* Button */
.view-details {
  background: #1a2b3c;
  color: white;
  border: none;
  padding: 12px 24px;
  border-radius: 6px;
  font-weight: 600;
  cursor: pointer;
  width: 100%;
  transition: background 0.3s ease;
}

.view-details:hover {
  background: #FFCD00;
  color: #000;
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

<section class="equipment-gallery">
    <h2 class="section-title">Our Equipment</h2>
    
    <div class="equipment-grid">
        <article class="equipment-card">
            <div class="image-container">
                <img src="./img/equipmentcatalog/Caterpillar_312B.jpg" alt="Model 312B">
            </div>
            <div class="content">
                <span class="brand-label">CATERPILLAR</span>
                <h1 class="model-title">Model 312B</h1>

                <hr class="divider">

               <p class="description">
    Steel tracked hydraulic excavator with breakerline, 
    <strong>0.50 cubic meter</strong> bucket capacity.
  </p>
          <button class="view-details">Get a Quote</button>
            </div>
        </article>

    

  <article class="equipment-card">
            <div class="image-container">
                <img src="./img/equipmentcatalog/Caterpillar_320DRR.jpg" alt="Model 320DRR">
            </div>
            <div class="content">
                <span class="brand-label">CATERPILLAR</span>
                <h1 class="model-title">Model 320DRR</h1>

                <hr class="divider">

               <p class="description">
    Steel tracked hydraulic excavator with breakerline, <strong>0.75</strong> cubic meter bucket capacity
  </p>
          <button class="view-details">Get a Quote</button>
            </div>
        </article>

  <article class="equipment-card">
            <div class="image-container">
                <img src="./img/equipmentcatalog/Caterpillar_D3B.jpg" alt="Model D3B">
            </div>
            <div class="content">
                <span class="brand-label">CATERPILLAR</span>
                <h1 class="model-title">Model D3B</h1>

                <hr class="divider">

               <p class="description">
    Steel tracked, 6 way , bulldozer
  </p>
          <button class="view-details">Get a Quote</button>
            </div>
        </article>




    
<article class="equipment-card video-card" onclick="openModal('img/equipmentcatalog/Caterpillar_E70B.mp4')">
    <div class="image-container">
        <img src="./img/equipmentcatalog/Caterpillar_E70B.jpg" alt="Model E70B">
        <div class="play-overlay">
            <span class="play-icon">▶</span>
        </div>
    </div>
    <div class="content">
         <div class="content">
                <span class="brand-label">CATERPILLAR</span>
                <h1 class="model-title">Model E70B</h1>

                <hr class="divider">

               <p class="description">
    Steel tracked hydraulic excavator with breakerline, 0.25 cubic meter bucket capacity
  </p>
          <button class="view-details">Get a Quote</button>
            </div>
    
    </div>
</article>

<div id="videoModal" class="modal">
    <span class="close-modal">&times;</span>
    <div class="modal-content">
        <video id="modalVideo" controls>
            <source src="./img/equipmentcatalog/Caterpillar_E70B.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>


 <article class="equipment-card">
            <div class="image-container">
                <img src="./img/equipmentcatalog/Fuso_Great.jpg" alt="Great">
            </div>
            <div class="content">
                <span class="brand-label">Fuso</span>
                <h1 class="model-title">Model Great</h1>

                <hr class="divider">

               <p class="description">
    12 Wheeler  Selfloading Truck , 25 Tonner capacity
  </p>
          <button class="view-details">Get a Quote</button>
            </div>
        </article>

 <article class="equipment-card">
            <div class="image-container">
                <img src="./img/equipmentcatalog/Isuzu_Giga2.jpg" alt="Giga">
            </div>
            <div class="content">
                <span class="brand-label">Isuzu</span>
                <h1 class="model-title">Model Giga</h1>

                <hr class="divider">

               <p class="description">
    6 Wheeler  Dump Truck , 3 cubic meter dump box capacity
  </p>
          <button class="view-details">Get a Quote</button>
            </div>
        </article>

 <article class="equipment-card">
            <div class="image-container">
                <img src="./img/equipmentcatalog/Hanix_N300-2.jpg" alt="Hanix_N300-2">
            </div>
            <div class="content">
                <span class="brand-label">Hanix_N300-2</span>
                <h1 class="model-title">Model N300-2</h1>

                <hr class="divider">

               <p class="description">
    Steel tracked hydraulic excavator with breakerline, 0.10cubic meter bucket capacity
  </p>
          <button class="view-details">Get a Quote</button>
            </div>
        </article>

 <article class="equipment-card">
            <div class="image-container">
                <img src="./img/equipmentcatalog/Hanix_N300-2.jpg" alt="Isuzu_Giga">
            </div>
            <div class="content">
                <span class="brand-label">Isuzu</span>
                <h1 class="model-title">Model Giga</h1>

                <hr class="divider">

               <p class="description">
    Steel tracked hydraulic excavator with breakerline, 0.10cubic meter bucket capacity
  </p>
          <button class="view-details">Get a Quote</button>
            </div>
        </article>


</section>


    <section class="cta-container position-relative overflow-hidden py-5 px-3">
        <a href="#" class="stretched-link text-decoration-none"></a>

        <div class="container text-center py-4">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">

                    <p class="orange-label fw-bold mb-3" style="color:#FFEB3B !important;">GET A QUOTE TODAY</p>

                    <h2 class="display-5 fw-bold text-white mb-3">
                        Need equipment for your next project?
                    </h2>

                    <a href="requestform.php"></a>
                    <p class="h4 text-light opacity-90 fw-light" style="color:#FFEB3B !important;">
                        👉 Request a quotation today and let us help you get started!
                    </p></a>

                </div>
            </div>
        </div>
    </section>



<script>
function openModal(videoSrc) {
    const modal = document.getElementById("videoModal");
    const video = document.getElementById("modalVideo");
    
    modal.style.display = "block";
    video.src = videoSrc; 
    video.play();
}

// Close modal when clicking 'X'
document.querySelector(".close-modal").onclick = function() {
    closeVideo();
};

// Close modal when clicking outside the video
window.onclick = function(event) {
    const modal = document.getElementById("videoModal");
    if (event.target == modal) {
        closeVideo();
    }
};

function closeVideo() {
    const modal = document.getElementById("videoModal");
    const video = document.getElementById("modalVideo");
    modal.style.display = "none";
    video.pause();
    video.src = ""; // Clears source to stop loading
}



</script>



    <?php require 'footertemplate.php'; ?>
</body>
</html>