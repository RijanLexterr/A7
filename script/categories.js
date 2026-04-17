
        const equipmentData = {
            trucks: {
                title: "TRUCKS TRANSPORT",
                units: [
                    {
                        name: "Fuso Great",
                        img: "./img/equipmentcatalog/Fuso_Great.jpg",
                        desc: "Earum omnis quae qui temporibus dolor sit. Rerum suscipit molestiae et id perferendis.",
                        specs: "No record/s found...",
                        inclusions: "1 Driver and 1 Helper"
                    },
                    {
                        name: "Isuzu Giga",
                        img: "./img/equipmentcatalog/Isuzu_Giga.jpg",
                        desc: "Also known as a prime mover, semi-tractor, truck, or big rig.",
                        specs: "Bed Space: 6.2m | Capacity: 6x4 (10w)",
                        inclusions: "Standard Logistics Support"
                    }
                ]
            },
            bulldozer: {
                title: "BULLDOZER",
                units: [
                    {
                        name: "Caterpillar D3B",
                        img: "./img/equipmentcatalog/Caterpillar_D3B.jpg",
                        desc: "Heavy duty bulldozer for massive earthmoving projects.",
                        specs: "Operating Weight: 100,000kg",
                        inclusions: "Certified Operator Included"
                    },
                        {
                        name: "Mitsubishi BD2G",
                        img: "./img/equipmentcatalog/Mitsubishi_BD2G.jpg",
                        desc: "High precision digging and lifting capabilities.",
                        specs: "Bucket Capacity: 1.2m3",
                        inclusions: "On-site Maintenance Support"
                    },
               


                ]
            },
            excavator: {
                title: "EXCAVATOR",
                units: [
                    {
                        name: "Caterpillar 312B",
                        img: "./img/equipmentcatalog/Caterpillar_312B.jpg",
                        desc: "High precision digging and lifting capabilities.",
                        specs: "Bucket Capacity: 1.2m3",
                        inclusions: "On-site Maintenance Support"
                    },
                      {
                        name: "Caterpillar 320DRR",
                        img: "./img/equipmentcatalog/Caterpillar_320DRR.jpg",
                        desc: "High precision digging and lifting capabilities.",
                        specs: "Bucket Capacity: 1.2m3",
                        inclusions: "On-site Maintenance Support"
                    },
                      {
                        name: "Caterpillar E70B",
                        img: "./img/equipmentcatalog/Caterpillar_E70B.jpg",
                        desc: "High precision digging and lifting capabilities.",
                        specs: "Bucket Capacity: 1.2m3",
                        inclusions: "On-site Maintenance Support"
                    },
                      {
                        name: "Hanix N300-2",
                        img: "./img/equipmentcatalog/Hanix_N300-2.jpg",
                        desc: "High precision digging and lifting capabilities.",
                        specs: "Bucket Capacity: 1.2m3",
                        inclusions: "On-site Maintenance Support"
                    },

                     {
                        name: "Kobelco SK60 Mark 3",
                        img: "./img/equipmentcatalog/Kobelco_SK60 Mark 3.jpg",
                        desc: "High precision digging and lifting capabilities.",
                        specs: "Bucket Capacity: 1.2m3",
                        inclusions: "On-site Maintenance Support"
                    },

                         {
                        name: "Komatsu_PC100-3",
                        img: "./img/equipmentcatalog/Komatsu_PC100-3.png",
                        desc: "High precision digging and lifting capabilities.",
                        specs: "Bucket Capacity: 1.2m3",
                        inclusions: "On-site Maintenance Support"
                    },

                    
                ]
            }
        };

     function openEquipmentModal(category) {
    const data = equipmentData[category];
    const container = document.getElementById('equipment-list-container');
    const titleElement = document.getElementById('modal-category-title');
    const selectElement = document.querySelector('.unit-select');
    
    titleElement.innerText = data.title;
    
    // 1. Clear and Populate the Dropdown
    selectElement.innerHTML = `<option value="">Select Unit</option>`;
    data.units.forEach((unit, index) => {
        selectElement.innerHTML += `<option value="unit-${index}">${unit.name}</option>`;
    });

    // 2. Clear and Load Units with IDs
    container.innerHTML = "";
    data.units.forEach((unit, index) => {
        container.innerHTML += `
            <div class="unit-detail-row" id="unit-${index}">
                <img src="${unit.img}" alt="${unit.name}">
                <div>
                    <h4>Description</h4>
                    <p><strong>${unit.name}</strong><br>${unit.desc}</p>
                    <h4>Specifications</h4>
                    <p>${unit.specs}</p>
                </div>
                <div>
                    <h4>Standard Inclusions</h4>
                    <p><strong>Manpower:</strong><br>${unit.inclusions}</p>
                    <p><strong>Equipment:</strong><br>Third Party Certified</p>
                </div>
                <div>
                    <h4>Insurance & Support</h4>
                    <p>Up to PhP 2 Million Insurance Coverage per Trip</p>
                    <a href="requestform.php"><button class="get-quote-btn">Get a Quote</button></a>
                </div>
            </div>
        `;
    });

    document.getElementById('equipmentModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

        function closeModal() {
            document.getElementById('equipmentModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Function to handle the dropdown selection
document.querySelector('.unit-select').addEventListener('change', function() {
    const targetId = this.value;
    if (targetId) {
        const element = document.getElementById(targetId);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
});

        // Close modal if user clicks outside the window
        window.onclick = function(event) {
            const modal = document.getElementById('equipmentModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    