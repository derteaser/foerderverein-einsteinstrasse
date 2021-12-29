const mixer = require('svg-mixer');

class MySprite extends mixer.Sprite {
    generate() {
        // Call parent `generate` method and then transform the tree
        return super.generate().then(svg => {
            svg.each('symbol', node => node.attrs.class = null);
            svg.each('title', node => node = null);
            return svg;
        });
    }
}

mixer([
  // Directions
  'node_modules/heroicons/outline/chevron-left.svg',
  'node_modules/heroicons/outline/chevron-right.svg',
  // Brands
  'node_modules/simple-icons/icons/amazon.svg',
  'src/img/diakonie.svg',
  'node_modules/simple-icons/icons/facebook.svg',
  'node_modules/simple-icons/icons/instagram.svg',
  // Misc
  'node_modules/heroicons/solid/heart.svg',
  'node_modules/heroicons/outline/home.svg',
], { spriteConfig: { usages: false }, spriteClass: MySprite } )
    .then(result => result.write('public/img/icons.svg'));
