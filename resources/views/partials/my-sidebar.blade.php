<main class="my-sidebar shadow-sm row">

    <div class="bg-white main-sidebar">
        <div class="ms-auto my-toggle">
            <div class="my-toggle-item"></div>
            <div class="my-toggle-item"></div>
            <div class="my-toggle-item"></div>
        </div>
        
            <div class="row justify-content-start content-toggle">
                <h4 class=" text-center my-4">Mata Pelajaran</h4>
                <hr class="my-0">
                <a href="#indo" class="text-decoration-none text-dark aktif shadow-sm py-3 mapel">Bahasa Indonesia</a>
                <a href="#mate" class="text-decoration-none text-dark shadow-sm py-3 mapel">Matematika</a>
            </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('.my-toggle').on('click', function(){
            $('.my-sidebar').toggleClass('hide-side')
            $('.my-toggle').toggleClass('hide-toggle')
            $('.my-sidebar').toggleClass('shadow-sm')
        })
    })
</script>