
// OPEN SIDEBAR IN MOBILE SCREEN.......


// function ShowSidebar() {
//     const SideBar = document.querySelector('.MobileNavNav-ContainerNavMenu')
//     SideBar.style.display = 'flex'
// }

// function HideSidebar() {
//     const SideBar = document.querySelector('.MobileNavNav-ContainerNavMenu')
//     SideBar.style.display = 'none'
// }






// ...........SHOW ICONS AND BUTTON ON IMAGE HOVER IN PRODUCT PAGE................

function ShowIconsOnImage() {
    const AddToBasketShow = document.querySelector('.AddToBasket');
    const ProductIconShow = document.querySelector('.ProductIcons');

    AddToBasketShow.style.display = 'flex';
    ProductIconShow.style.display = 'flex';
}
function HideIconsOnImage() {
    const AddToBasketShow = document.querySelector('.AddToBasket');
    const ProductIconShow = document.querySelector('.ProductIcons');

    AddToBasketShow.style.display = 'none';
    ProductIconShow.style.display = 'none';
}

// .............OUR NEW PRODUCTS ...............
const OurNewCollection = [
    {
        id: 1,
        productTitle: "Romantic Florals",
        productName: "Jacinth gold Ring",
        productImage:
            "./Assets/HomeProducts/StoneBracelet.png",
    },
    {
        id: 2,
        productTitle: "Romantic Florals",
        productName: "Diamond Stone bracelet",
        productImage:
            "./Assets/HomeProducts/Earrings.png",
    },
    {
        id: 3,
        productTitle: "Romantic Florals",
        productName: "Aquamarine Earrings",
        productImage:
            "./Assets/HomeProducts/GoldRing.png",
    },
    {
        id: 4,
        productTitle: "Romantic Florals",
        productName: "Amethyst Pentent Chain",
        productImage:
            "./Assets/HomeProducts/PententChain.png",
    },

]

window.addEventListener("DOMContentLoaded", function () {
    const Product1 = document.querySelector(".NewCollectionProducts");
    const ShowProduct1List = OurNewCollection.map((product, item) => {
        return `
        <div class="Product1" style="background-color: white;position: relative;" key=${item.id}>
                    <div class="ProductIcons">
                        <div class="ProductSearch"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                        </div>
                        <div class="ProductRepeat"><i class="fa-solid fa-repeat" style="color: #ffffff;"></i></div>
                        <div class="PRoductLike"><i class="fa-regular fa-heart" style="color: #ffffff;"></i></div>
                    </div>
                    <img src=${product.productImage}  alt=""
                        style="object-fit: cover; border: 1px solid #bbb;padding: 10px; background-color: white; cursor:pointer; width:300px;height:350px" onmouseover="ShowIconsOnImage()" onmouseout = "HideIconsOnImage()">

                    <div class="AddToBasket">
                        <div class="AddBTN">
                            <button>Add to Enquiry Basket</button>
                        </div>
                    </div>

                    <div class="ProductData">
                        <p class="ProductTitle">${product.productTitle}</p>
                        <h5 class="ProductName">${product.productName}</h5>
                        <div class="ProductsBTN">
                            <button class="SendEnquiry">Send Enquiry
                                <!-- <i class="fa-solid fa-arrow-right"></i> -->
                            </button>
                            <button class="QuickView">Quick View
                                <!-- <i class="fa-solid fa-arrow-right"></i> -->
                            </button>
                        </div>
                    </div>

                </div>
        `;
    }).join('');  // Join the array to avoid commas between elements

    // Product1.innerHTML = ShowProduct1List;
});







// ....................FOR ACTIVE NAVBAR LINKS ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,

// Get the current URL path and file name (e.g., 'index.html')
let currentLocation = location.href;
let menuItems = document.querySelectorAll('.NavMenu .Menu-UL .Menu-LI a');

// Loop through each menu link and compare with current URL
menuItems.forEach(item => {
    if (item.href === currentLocation) {
        item.parentElement.classList.add('active'); // Add 'active' class to the parent <li>
    } else {
        item.parentElement.classList.remove('active');
    }

});






// ....................OPEN SIDEBAR FOR MOBILE VIEW.........................

function ShowSidebarMobile() {
    const SideBar = document.querySelector('.MobileNavLinks')
    SideBar.style.display = 'flex'
}

function HideSidebarMobile() {
    const SideBar = document.querySelector('.MobileNavLinks')
    SideBar.style.display = 'none'
}
