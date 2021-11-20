
<!-- New Customers -->
<?php 
        $sql = "select * from users where (TIMESTAMPDIFF ( second,date_join, now() ) < 3600*24*30) and (role = 0)";

        $newUsers = pdo_get_all_rows($sql);
    
    ?>
<div class="recentCustomers">
    <div class="cardHeader">
        <h2><?=count($newUsers)?> người dùng đăng ký mới trong 1 tháng gần đây</h2>
    </div>
    
    <table>
        <?php 
            foreach($newUsers as $user){
                echo "<tr>
                <td width='60px'>
                    <div class='imgBx'>
                        <img src=\"../../images/user/{$user['img']}\"/>
                    </div>
                </td>
                <td>
                    <h4>{$user['fname']} {$user['lname']}<br/><span>{$user['email']}</span></h4>
                </td>
            </tr>";
            }
        
        
        ?>
            
       
    </table>
</div>