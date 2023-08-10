<?php
$page_title = 'Dashboard';
ob_start();
?>
<section>
    <div class="row">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia atque non repellat? Amet labore dolorem
            obcaecati eligendi asperiores! Saepe, dolorem? Rerum quibusdam nemo necessitatibus accusantium cum possimus
            repellendus hic enim incidunt eos quasi omnis nesciunt officia saepe, inventore corporis perferendis aperiam
            architecto assumenda. Totam unde odio minus non reiciendis culpa, optio cumque dolore ad facere accusantium
            numquam molestiae eos pariatur neque, voluptatum recusandae. Quisquam voluptatum in veritatis mollitia
            labore quae, tempore perferendis quibusdam! Debitis, exercitationem fugit eligendi labore ullam porro nam
            harum reiciendis praesentium dicta minima laudantium accusantium. Reprehenderit earum voluptatum magnam
            pariatur voluptates ratione incidunt, cum tenetur necessitatibus corporis?</p>
    </div>
</section>
<?php
$content = ob_get_clean();
$script = '';
include('./layout/master.php');
?>