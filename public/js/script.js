
document.querySelector('.sidebar-menu__icon').addEventListener('click',
  function () {
    var child;
    this.parentNode.nextElementSibling.classList.toggle('menu--on');
    child = this.childNodes[1].classList;
    if (child.contains('sidebar-menu__icon--to-arrow')) {
      child.remove('sidebar-menu__icon--to-arrow');
      child.add('sidebar-menu__icon--from-arrow');
    } else {
      child.remove('sidebar-menu__icon--from-arrow');
      child.add('sidebar-menu__icon--to-arrow');
    }
  });



