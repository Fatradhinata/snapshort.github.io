<style>

</style>

<script>    
    var category = ['Indonesia', 'Nature', 'Education', 'Comedy', 'Travel', 'Relaxing', 'Space', 'Fashion', 'Culinary', 'Sports', 'Technology', 'Tutorials', 'Arts and Craft', 'Gaming', 'Movies', 'Sports', 'Musical', 'Adventure', 'Horror']
    var categoryRow = document.querySelector('.cat-slct');
    var fileData = localStorage.getItem('<?= $videoValue ?>');
    var fileName = document.querySelector('.file-name');
    var video = document.querySelector('.video-content-core');

    category.forEach(element => {
        let opt = document.createElement('option');
        opt.classList.add('category-opt');
        opt.innerHTML = element;

        categoryRow.appendChild(opt);
    });

    var captInp = document.getElementById('caption-inp');
    captInp.onkeyup = () => {
        document.querySelector('.capt').innerHTML = captInp.value;
    }

getVideo();

function getVideo() {
       
        video.src = localStorage.getItem('<?= $videoValue ?>')
        video.load();
        fileName.innerHTML = fileData.fileName;
    }

</script>