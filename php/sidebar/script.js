const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toogle = body.querySelector(".toogle");

      toogle.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
      });
      