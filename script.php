<?php
$searchWords = ['house','apple','table','chair','bread','water', 'window','plant','world','ocean','river','storm','stone','cloud','money','music','clock','light','train','horse','pizza','movie','dream','tiger','store','dance','bread','fruit','tiger','brain','heart','beach','night','sugar','magic','fire','smile','glass','paper','child','grass'];
$x = rand(0, count($searchWords) - 1);

session_start();
if(!isset($_SESSION['searchWord'])){
    $_SESSION['searchWord'] = [$searchWords[$x]];
}
if (!isset($_SESSION['all_attempts'])) {
    $_SESSION['all_attempts'] = [];
}

# capturing the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # catch the attempt
    $attempt = strtolower($_POST['attempt']);

    
    echo '<div class="attempts">';
    
    # showing previous attempts
    for($i = 0; $i < count($_SESSION['all_attempts']); $i++){
        compare($_SESSION['all_attempts'][$i], $_SESSION['searchWord'][0]);
    }
    
    # store attempt to all_attempts
    $_SESSION['all_attempts'][] = $attempt;
    
    # new attempt compare
    compare($attempt, $_SESSION['searchWord'][0]);
    
}


function compare($attempt, $searchWord){
    #compare $searchWord and $attempt
    if($attempt === $searchWord){
        echo '<h1/>Congratulations, you won!</h1>';
        echo '<h3/> Right word is ' . $attempt . '</h3>'; 
        echo '<h4/> You had ' . count($_SESSION['all_attempts']) . ' attempts</h4>';
        session_destroy();
    }else{
        error_reporting(E_ALL & ~E_WARNING); #set no warning
        echo '<div class="line">';
            for($i = 0; $i < strlen($attempt); $i++){
                if($attempt[$i] === $searchWord[$i]){
                    echo '<div class="green">' . $attempt[$i] . '</div>';
                }else if(strpos($searchWord, $attempt[$i]) !== false){
                    echo '<div class="orange">' . $attempt[$i] . '</div>';
                }else{
                    echo '<div class="white">' . $attempt[$i] . '</div>';
                }
            }
        echo '</div>';
        error_reporting(E_ALL); #set warning back
    }
}
echo '</div>';
?>
