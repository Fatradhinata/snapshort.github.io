function createRipple(event) {
    const button = event.currentTarget;

    const circle = document.createElement("span");
    const diameter = Math.max(button.clientWidth, button.clientHeight);
    const radius = diameter / 2;
    console.log(radius, diameter, button.clientWidth, button.clientHeight);
    circle.style.width = circle.style.height = `${diameter}px`;
    circle.style.left = `-10%`;
    circle.style.top = `-50%`;
    circle.classList.add("ripple");

    const ripple = button.getElementsByClassName("ripple")[0];

    if (ripple) {
        ripple.remove();
        button.getElementsByTagName('p')[0].textContent = '+ Follow';
        button.style.color = '#fff';
        button.style.backgroundColor = '#424874';
        button.getElementsByTagName('img')[0].style.display = 'none'; 
    } else {
    
    button.getElementsByTagName('p')[0].textContent = 'Followed';    
    button.getElementsByTagName('img')[0].style.display = 'block';    
    button.style.color = '#424874'
    button.appendChild(circle);
    
    button.style.backgroundColor = '#E1E1E1';
    // window.location.assign("<?= base_url('UserMetrics/Follow/' . $user_content[$index]['user_id']) ?>");
}
}

const buttons = document.querySelectorAll(".button-follow");
console.log(buttons);
for (const button of buttons) {
    button.addEventListener("click", createRipple);
}