document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("searchInput");
    const menuItems = document.querySelectorAll(".menu-item");
    const noResultsMessage = document.getElementById("noResultsMessage");

    searchInput.addEventListener("input", function() {
      const searchText = searchInput.value.trim().toLowerCase();
      let foundResults = false;

      menuItems.forEach(function(item) {
        const itemName = item.querySelector(".menu-content a").innerText.toLowerCase();
        const itemCuisines = item.querySelector(".menu-cuisines").innerText.toLowerCase();

        if (itemName.includes(searchText) || itemCuisines.includes(searchText)) {
          item.style.display = "block";
          foundResults = true;
        } else {
          item.style.display = "none";
        }
      });

      if (foundResults) {
        noResultsMessage.style.display = "none";
      } else {
        noResultsMessage.style.display = "block";
      }
    });
  });