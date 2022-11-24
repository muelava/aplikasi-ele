<main class="my-sidebar shadow-sm row">
    
    <div class="ms-auto my-toggle">
        <div class="my-toggle-item"></div>
        <div class="my-toggle-item"></div>
        <div class="my-toggle-item"></div>
    </div>
    <div class="bg-white main-sidebar">

            <div class="row justify-content-start content-toggle">
                <h4 class=" text-center my-4">Mata Pelajaran</h4>
                <hr class="my-0">
                <a href="#indo" class="text-decoration-none text-dark aktif shadow-sm py-3 mapel">Bahasa Indonesia</a>
                <a href="#mate" class="text-decoration-none text-dark shadow-sm py-3 mapel">Matematika</a>
                <a href="#mate" class="text-decoration-none text-dark shadow-sm py-3 mapel">B. Inggris</a>
            </div>

    </div>
</main>

<script>
    $(document).ready(function(){
        $('.my-toggle').on('click', function(){
            $('.my-sidebar').toggleClass('hide-side')
            $('.my-toggle').toggleClass('hide-toggle')
            $('.my-sidebar').toggleClass('shadow-sm')
        })
    })
</script>