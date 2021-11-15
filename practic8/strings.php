<section>

    <h2>Strings</h2>
    <div class="tests">
        <div>
            <h3>Loop 1</h3>
            <?php
            for($i = 0; $i <= 10; $i++) {
                echo 'The number is: $i <br>';
            }
            ?>
        </div>
        <div>
            <h3>Loop 2</h3>
            <?php
            for($i = 0; $i <= 10; $i++) {
                echo "The number is: $i <br>";
            }
            ?>
        </div>
        <div>
            <h3>Concatenation</h3>
            <?php
            $index = 1;
            echo "test ".$index." end of test";
            ?>
        </div>
    </div>
    
</section>

<style>
    section {
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .tests {
        width: inherit;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }
</style>
