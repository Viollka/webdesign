<section>

    <h2>Arrays</h2>
    <div class="tests">
        <div>
            <h3>Index array</h3>
            <?php
            $days = ["Mon", "Tue", "Wed"];
            echo "I like " . $days[0] . ", and hate " . $days[1] . " and " . $days[2] . ". <br>";
            echo "Array Length: ".count($days)."<br>";
            ?>
            
        </div>
        <div>
            <h3>Associative arrays</h3>
            <?php
            $days = ["Mon", "Tue", "Wed"];
            for ($i = 0; $i < count($days); $i++) {
               echo $days[$i];
               echo "<br>";
            }
            echo "<br>";
            $age = ["Mon" => "8:00", "Tue" => "9:00", "Wed" => "42"];
            echo "Mon start at " . $age['Mon']."<br>";

            foreach($age as $key => $value) {
               echo "Key=" . $key . ", Value=" . $value;
               echo "<br>";
            }
            
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