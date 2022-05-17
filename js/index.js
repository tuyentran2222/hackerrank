const header = document.getElementById('header');
function scrollHeader() {
    if (!header) return;
    if (this.scrollY >=50 ) {
        header.classList.add('scroll-header');
        header.classList.remove('dark')
    } else {
        if (header.classList.contains('header-active')) header.classList.add('dark')
        header.classList.remove('scroll-header');
    }
}
window.addEventListener('scroll', scrollHeader);
const tabs = document.querySelectorAll(".tab-item");
const panes = document.querySelectorAll(".tab-pane");

tabs.forEach((tab, index) => {
    const pane = panes[index];
  
    tab.onclick = function () {
        document.querySelector(".tab-item.active").classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove("active");
    
        this.classList.add("active");
        pane.classList.add("active");
    };
  });
  
