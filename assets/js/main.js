const items = document.querySelectorAll(".accordion-item");

items.forEach((item) => {
  const header = item.querySelector(".accordion-header");
  header.addEventListener("click", () => {
    item.classList.toggle("active");
  });
});

function toggleCart(open) {
  const overlay = document.querySelector(".overlay");
  const cart = document.querySelector(".cart-slide");
  if (open) {
    overlay.style.display = "block";
    cart.classList.add("open");
  } else {
    overlay.style.display = "none";
    cart.classList.remove("open");
  }
}

const searchInput = document.getElementById("searchInput");
const searchHeader = document.getElementById("searchHeader");

searchInput.addEventListener("focus", () => {
  searchHeader.classList.add("active");
});

searchInput.addEventListener("blur", () => {
  // Nếu muốn ẩn khi mất focus thì dùng dòng này
  searchHeader.classList.remove("active");
});
