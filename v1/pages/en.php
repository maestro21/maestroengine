
    <p style="display: block;"><strong style="display: inline;">Maestro Studio</strong> is a Swiss Web Development Company that offers full range of services to create and develop your needs for a personalized website as well as Blockchain development based on EthereumSolidity. Blockchain is the revolutionary technology of our time, which provides a convenient, independent and secure way to exchange information and provide financial transactions. Our products are of high quality and developed in the heart of Switzerland. Our products and services include:</p>
    <ul style="display: block;">
        <li style="display: list-item;">Swiss quality</li>
        <li style="display: list-item;">High professionalism of our specialists</li>
        <li style="display: list-item;">Full-stack development</li>
        <li style="display: list-item;">Reasonable prices</li>
    </ul>
    <p style="display: block;">We would gladly consider any proposals for cooperation and would seriously consider start-ups, projects, freelance offers in the field of web development, Internet projects and Blockchain.</p>

        <p style="display: block;"> </p><div class="center" style="display: block;">
            <div class="contacttext" style="display: inline-block;">
                <table style="width: 100%; display: table;">
                    <tbody style="display: table-row-group;">
                    <tr style="display: table-row;">
                        <td class="center" style="display: table-cell;"><?php echo icon('fab fa-whatsapp');?></td>
                        <td style="display: table-cell;">
                            <a href="tel:+41787320722" style="display: inline;">+41 787 32 07 22</a>
                        </td>
                    </tr>
                    <tr style="display: table-row;">
                        <td class="center" style="display: table-cell;"><?php echo icon('far fa-envelope');?></td>
                        <td style="display: table-cell;">
                            <a href="mailto:sp@webstudio-maestro.com" style="display: inline;">sp@webstudio-maestro.com</a>
                        </td>
                    </tr>
                    <tr style="display: table-row;">
                        <td class="center" style="display: table-cell;"><?php echo icon('fab fa-skype');?></td><td colspan="2" style="display: table-cell;">
                            <a href="skype:sergeyspopov?chat" style="display: inline;">Sergei Popov</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <form method="POST" id="form" action="http://localhost/maestroengine/maestrostudio/contactform/save?ajax=1" novalidate="novalidate" style="display: inline-block;">
            <input type="hidden" name="id" id="id" value="" style="display: inline-block;">
            <div class="half" style="display: inline-block;">
                <table cellpadding="0" cellspacing="0" style="display: table;">


                    <tbody style="display: table-row-group;"><tr style="display: table-row;">
                        <td>Name:<br>
                            <input type="text" value="" name="form[name]" id="name" style="display: inline-block;">
                            <label for="name" style="display: inline;"></label>
                        </td>
                    </tr>


                    <tr style="display: table-row;">
                        <td>Email:<br>
                            <input type="email" value="" name="form[email]" id="email" style="display: inline-block;">
                            <label for="email" style="display: inline;"></label>
                        </td>
                    </tr>

                    </tbody></table>
            </div>
            <div class="half half2" style="display: inline-block;">
                <label for="sent" style="display: inline;"></label>
                <table  cellpadding="0" cellspacing="0">

                    <tbody style="display: table-row-group;"><tr style="display: table-row;">
                        <td>Text:<br>
                            <textarea  name="form[text]" id="text" style="display: inline-block;"></textarea>
                            <label for="text" style="display: inline;"></label>
                        </td>
                    </tr>


                    <tr style="display: table-row;">
                        <input type="hidden" value="" name="form[sent]" id="sent" style="display: inline-block;">


                    </tr>

                    <tr style="display: table-row;">
                        <td colspan="2" align="center" style="display: table-cell;">
                            <?php echo btn([
                               'text' => 'Submit'
                            ]); ?>
                        </td>
                    </tr>
                    </tbody></table>
            </div>
        </form>
    <a href="http://localhost/maestroengine/v07full/data/uploads/galleries/1/367.png" rel="shadowbox">
        <div class="third box" style="width:300px;height:200px;background-image: url('http://localhost/maestroengine/v07full/data/uploads/galleries/1/367.png');">
            <div class="btns"><a class="nobtn btn"><i class="icon fab fa-whatsapp"></i></a></div>
        </div>
    </a>

      <div class="third">
          Maestro Studio is a Swiss Web Development Company that offers full range of services to create and develop your needs for a personalized website as well as Blockchain development based on EthereumSolidity. Blockchain is the revolutionary technology of our time, which provides a convenient, independent and secure way to exchange information and provide financial transactions. Our products are of high quality and developed in the heart of Switzerland.
      </div>

        <div class="third">
            Maestro Studio is a Swiss Web Development Company that offers full range of services to create and develop your needs for a personalized website as well as Blockchain development based on EthereumSolidity. Blockchain is the revolutionary technology of our time, which provides a convenient, independent and secure way to exchange information and provide financial transactions. Our products are of high quality and developed in the heart of Switzerland.
        </div>

        <div class="third">
            Maestro Studio is a Swiss Web Development Company that offers full range of services to create and develop your needs for a personalized website as well as Blockchain development based on EthereumSolidity. Blockchain is the revolutionary technology of our time, which provides a convenient, independent and secure way to exchange information and provide financial transactions. Our products are of high quality and developed in the heart of Switzerland.
        </div>


        <?php echo block(box([
          'w' => 300,
          'h' => 200,
          'text' => 'Random box',
          'bg' => 'https://picsum.photos/300/200',
          'btns' => [
              [
                  'icon' => 'fas fa-pencil-alt',
                  'class' => 'nobtn'
              ]
          ]
        ]));?>

        <?php echo block(sbox([
            'link' => 'http://localhost/maestroengine/v07full/data/uploads/galleries/1/367.png',
            'w' => 300,
            'h' => 200,
            'text' => 'Random box',
            'bg' => 'http://localhost/maestroengine/v07full/data/uploads/galleries/1/367.png',
            'btns' => [
                [
                    'icon' => 'fas fa-pencil-alt',
                    'class' => 'nobtn'
                ]
            ]
        ]));?>

        <?php echo popupbtn('popupcontent', 'Open popup');?>


        <?php echo popup('popupcontent', '
                <h3>Popup content</h3>
                Some popup content
                ' . popupbtn('popupcontent2', 'Another popup')
        );?>

        <?php echo popup('popupcontent2', 'Another popup');?>
