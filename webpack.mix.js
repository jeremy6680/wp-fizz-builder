/* code inspired by solutions provided here:
* https://github.com/JeffreyWay/laravel-mix/issues/67#issuecomment-528844842
* https://github.com/JeffreyWay/laravel-mix/issues/982#issuecomment-454855384
*/

    const fs = require('fs');
    const path = require('path');
    const mix = require('laravel-mix');

    mix
    .sass("assets/src/scss/global.scss", "assets/dist/")
    .browserSync({
        proxy: "http://wp-fizz-builder.test/"
    });

    const folders = fs.readdirSync(path.resolve(__dirname, 'components' ), 'utf-8')  
    
    for (let folder of folders) {
        if(folder != '.DS_Store' && folder != 'index.php') {
            mix.sass(`components/${folder}/style.scss`, 'assets/dist/components.css');
          }
       
    }