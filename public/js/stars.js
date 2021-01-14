function starsHovering() {
    for (let i = 1; i <= 5; i++) {
        document.getElementById(i).onmouseover = onmouseover;

        document.getElementById(i).onmouseout = onmouseout;

        document.getElementById(i).onclick = onclick;

        function onmouseover() {
            for(let j = i; j > 0; j--)
                document.getElementById(j).style.color = "yellow";
        }

        function onmouseout() {
            for(let j = i; j > 0; j--)
                document.getElementById(j).style.color = "white";
        }

        function onclick() {
            for (let j = 1; j <= 5; j++){
                document.getElementById(j).onmouseover = null;
                document.getElementById(j).onmouseout = null;

                for(let k = i + 1; k <= 5; k++)
                    document.getElementById(k).style.color = "white";
                for(let k = i; k > 0; k--)
                    document.getElementById(k).style.color = "yellow";
            }

            let rate = countStars();
            document.getElementById('rate').value = rate;
            if(rate > 0) showSubmit();
        }
    }
}

function countStars(){
    let stars = 0;
    for(let i = 1; i <= 5; i++){
        if(document.getElementById(i).style.color==="yellow"){
            stars++;
        }
    }
    return stars;
}

function showSubmit() {
    document.getElementById('add-my-recipe').style.visibility = 'visible';
}
