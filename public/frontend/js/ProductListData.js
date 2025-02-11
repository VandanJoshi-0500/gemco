const ProductDataList = [
  {
    id: 1,
    productTitle: "Romantic Florals",
    productName: "Aquamarine Earrings",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },
  {
    id: 2,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },
  {
    id: 3,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },
  {
    id: 4,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },{
    id: 5,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },{
    id: 6,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },{
    id: 7,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },{
    id: 8,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },{
    id: 9,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },{
    id: 10,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },{
    id: 11,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },{
    id: 12,
    productTitle: "Romantic Florals",
    productName: "Jacinth gold Ring",
    productImage:
      "./Assets/ProductListIMGs/GoldRing.png",
  },
];

window.addEventListener("DOMContentLoaded", function () {
    const ShopContainer = document.querySelector(".ShopContainer");
    const ShowProductList = ProductDataList.map((product, index) => {
        return `
            <div class="Product1" style="background-color: white; position: relative;" key=${index}>
                <div class="ProductIcons">
                    <div class="ProductSearch"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></div>
                    <div class="ProductRepeat"><i class="fa-solid fa-repeat" style="color: #ffffff;"></i></div>
                    <div class="ProductRepeat"><i class="fa-regular fa-heart" style="color: #ffffff;"></i></div>
                </div>
                <img src="${product.productImage}" class="Product" alt="" style="object-fit: cover; border: 1px solid #bbb; padding: 10px; background-color: white; cursor: pointer; width: 300px; height: 350px" onclick="GoToProductDetailPage()">

                <div class="AddToBasket">
                    <div class="AddBTN">
                        <button>Add to Enquiry Basket</button>
                    </div>
                </div>

                <div class="ProductData">
                    <p class="ProductTitle" onclick="GoToProductDetailPage()">${product.productTitle}</p>
                    <h5 class="ProductName" onclick="GoToProductDetailPage()">${product.productName}</h5>
                    <div class="ProductsBTN">
                        <button class="SendEnquiry">Send Enquiry</button>
                        <button class="QuickView" data-index="${index}">Quick View</button>
                    </div>
                </div>
            </div>
        `;
    }).join('');

    ShopContainer.innerHTML = ShowProductList;

    // Modal Elements
    const modal = document.getElementById("productModal");
    const closeModal = document.querySelector(".close");
    const modalTitle = document.getElementById("modalTitle");
    const modalName = document.getElementById("modalName");
    const modalImage = document.getElementById("modalImage");

    // Attach event listeners to all Quick View buttons
    document.querySelectorAll(".QuickView").forEach(button => {
        button.addEventListener("click", function () {
            const productIndex = this.getAttribute("data-index");
            const product = ProductDataList[productIndex];
            
            // Populate modal with product data
            modalTitle.innerText = product.productTitle;
            modalName.innerText = product.productName;
            modalImage.src = product.productImage;

            // Display the modal
            modal.style.display = "flex";
        });
    });

    // Close the modal when the close button is clicked
    closeModal.onclick = function () {
        modal.style.display = "none";
    };

    // Close the modal if user clicks outside of the modal content
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
});




function GoToProductDetailPage(){
   window.location.href ="./ProductDetail.html";
}


// ...........FUNCTION FOR SHOW BTNS AND ICONS ON IMAGE HOVER

// function ShowIconsOnImage() {
//     const AddToBasketShow = document.querySelector('.AddToBasket');
//     const ProductIconShow = document.querySelector('.ProductIcons');

//     AddToBasketShow.style.display = 'flex';
//     ProductIconShow.style.display = 'flex';

// }
// function HideIconsOnImage() {
//     const AddToBasketShow = document.querySelector('.AddToBasket');
//     const ProductIconShow = document.querySelector('.ProductIcons');

//     AddToBasketShow.style.display = 'none';
//     ProductIconShow.style.display = 'none';
// }

document.addEventListener("DOMContentLoaded", () => {
  setTimeout(() => {
      const productContainers = document.querySelectorAll('.Product1');
      
      productContainers.forEach(container => {
          container.addEventListener('mouseenter', () => {
              const addToBasket = container.querySelector('.AddToBasket');
              const productIcons = container.querySelector('.ProductIcons');
              addToBasket.style.display = 'flex';
              productIcons.style.display = 'flex';
          });

          container.addEventListener('mouseleave', () => {
              const addToBasket = container.querySelector('.AddToBasket');
              const productIcons = container.querySelector('.ProductIcons');
              addToBasket.style.display = 'none';
              productIcons.style.display = 'none';
          });
      });
  }, 100); // Adjust delay if necessary
});


document.addEventListener("DOMContentLoaded", () => {
  const productContainers = document.querySelectorAll('.Product1');
  
  console.log("Product containers found:", productContainers.length);

  productContainers.forEach((container, index) => {
      console.log(`Setting up container ${index + 1}`);
      
      container.addEventListener('mouseenter', () => {
          const addToBasket = container.querySelector('.AddToBasket');
          const productIcons = container.querySelector('.ProductIcons');
          
          // Check if elements are selected
          console.log("AddToBasket:", addToBasket, "ProductIcons:", productIcons);
          
          addToBasket.style.display = 'flex';
          productIcons.style.display = 'flex';
      });

      container.addEventListener('mouseleave', () => {
          const addToBasket = container.querySelector('.AddToBasket');
          const productIcons = container.querySelector('.ProductIcons');
          addToBasket.style.display = 'none';
          productIcons.style.display = 'none';
      });
  });
});







// .......................FUNCTION FOR SEARCH ...............
function filterProducts() {
  // Get the search input and convert it to lowercase
  let searchInput = document.getElementById('searchInput').value.toLowerCase();
  
  // Get all the product items
  let products = document.getElementsByClassName('Product1');
  
  for (let i = 0; i < products.length; i++) {
      let product = products[i];
      if (product.textContent.toLowerCase().includes(searchInput)) {
          product.style.display = '';
      } else {
          product.style.display = 'none';
      }
  }
}

// .......................FUNCTION FOR SEARCH   MOBILE DEVICES ...............
function filterProductsMobile() {
  // Get the search input and convert it to lowercase
  let searchInput = document.getElementById('searchInputMobile').value.toLowerCase();
  
  // Get all the product items
  let products = document.getElementsByClassName('Product1');
  
  for (let i = 0; i < products.length; i++) {
      let product = products[i];
      if (product.textContent.toLowerCase().includes(searchInput)) {
          product.style.display = '';
      } else {
          product.style.display = 'none';
      }
  }
}





// .................FUNCTION FOR OPEN SIDEBAR IN MOBILE VIEW ............. 
function OpenSideBar(){
  
}

// const openBtn = document.getElementById('open-btn');
const closeBtn = document.getElementById('close-btn');
const Sidebar = document.querySelector('.ProductListDifferentSectionMobile')
const OpenBTN = document.querySelector('.ProductListFilterMobile button')

// Function to open the sidebar
function Opensidebar() {
  Sidebar.style.display = "block"
}

function CloseSidebar (){
  Sidebar.style.display = "none"
}



// Get the modal and button elements
const modal = document.getElementById("myModal");
const openModalBtn = document.getElementById("openModalBtn");
const closeModalBtn = document.querySelector(".closeModal");

// Open the modal
openModalBtn.onclick = function() {
    modal.style.display = "flex";
}

// Close the modal when the close button is clicked
closeModalBtn.onclick = function() {
    modal.style.display = "none";
}

// Close the modal if user clicks outside of it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}


// ............MODAL INNER Quantity Script.................... 

let number = 1;

function updateDisplay() {
    document.getElementById("ProductQuantity").innerText = number;
}

function increase() {
    number++;
    // updateDisplay();
    console.log(updateDisplay());
    
}

function decrease() {
    number--;
    // updateDisplay();
    console.log(updateDisplay());
}










// .....................FUCTION FOR PAGINATION.....................
// Pagination settings

const ProductGallery = document.querySelector('.ShopContainer').children;
console.log(ProductGallery);


const PagePrevious = document.querySelector(".PaginationLiPreVious");
const PageNext = document.querySelector(".PaginationLiNext");
const ProductMaxItems = 12;
let Index = 1;
const Page = document.querySelector(".PaginationLi")
 
const pagination = Math.ceil(ProductGallery.length/ProductMaxItems);
console.log(pagination);


// PagePrevious.addEventListener("click",function(){
//   Index--;
//   check()
//   ShowProductListingItems()
// })
// PageNext.addEventListener("click",function(){
//   Index++;
//   check()
//   ShowProductListingItems()
// })
// function check(){
//   if(Index == pagination){
//     PageNext.classList.add("disabled")
//   }else{
//     PageNext.classList.remove("disabled")
//   }

//   if(Index == 1){
//     PagePrevious.classList.add("disabled")
//   }else{
//     PagePrevious.classList.remove("disabled")

//   }

// }

// function ShowProductListingItems(){
//   console.log("hello");
  
//   for(let i = 0; i<ProductGallery.length;i++){
//     console.log(i);
    
//     ProductGallery[i].classList.add("Show")
//     ProductGallery[i].classList.add("hide")


//     if(i >= (Index*ProductMaxItems) - ProductMaxItems && Index*ProductMaxItems){
//     ProductGallery[i].classList.remove("hide")
//     ProductGallery[i].classList.add("Show")
//     }
//     Page.innerHTML = Index;
//   }

 

// }



// window.onload = function(){
//    ShowProductListingItems()
//    check()
// }










// .....................PRODUCT FILTER PAGE INNER DROPDOWN..................

// function OpenProductCatagory(){

//   const Catagory = document.querySelector(".ProductCategoryTitle a")
//   const CatagoryDropdown = document.querySelector(".ProductCategoryCheckBox")

//   CatagoryDropdown.style.display = "flex"

// }
// function CloseProductCatagory(){

//   const Catagory = document.querySelector(".ProductCategoryTitle a")
//   const CatagoryDropdown = document.querySelector(".ProductCategoryCheckBox")

//   CatagoryDropdown.style.display = "flex"

// }