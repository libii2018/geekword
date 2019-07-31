
$('.carossels').slick();

function OnClickMenu(){
  document.getElementById("menu-bar").classList.toggle("total");
  document.getElementById("menu").classList.toggle("change");
  document.getElementById("nav_res").classList.toggle("change");
}

function OnClickDropdown(){
  document.getElementById("nav-user-img").classList.toggle("nav-user-img-action");
  document.getElementById("nav-user-dropdown").classList.toggle("nav-user-dropdown-action");
  document.getElementById("nav-user").classList.toggle("nav-user-action");
}

$('textarea').trumbowyg({
  lang: 'fr'
});