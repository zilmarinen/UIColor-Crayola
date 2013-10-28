<?php

//
//*******
//
//	filename: crayola_colors.php
//	author: Zack Brown
//	date: 21/05/2013
//
//*******
//

function uicolor_from_hex($hex)
{
	$dec = hexdec($hex);
	
	$red_255 = 0xFF & $dec >> 0x10;
	$green_255 = 0xFF & $dec >> 0x8;
	$blue_255 = 0xFF & $dec;

	$red_1 = ((1 / 255) * $red_255);
	$green_1 = ((1 / 255) * $green_255);
	$blue_1 = ((1 / 255) * $blue_255);

	return "[UIColor colorWithRed:" . number_format($red_1, 2) . " green:" . number_format($green_1, 2) . " blue:" . number_format($blue_1, 2) . " alpha:1.0]";
}

function uicolor_name($name)
{
	return "crayola" . str_replace(" ", "", ucwords($name)) . "Color";
}

function uicolor_table_row($name, $hex, $width, $height, $image_url)
{
	$table_row = "\t<tr>\n";
	$table_row .= "\t\t<td><img src=\"$image_url" . image_filename($name) . "\" alt=\"" . uicolor_name($name) . "\" width=\"$width\" height=\"$height\" /></td>\n";
	$table_row .= "\t\t<td>$name</td>\n";
	$table_row .= "\t\t<td>[UIColor " . uicolor_name($name) . "]</td>\n";
	$table_row .= "\t\t<td>" . uicolor_from_hex($hex) . "</td>\n";
	$table_row .= "\t</tr>\n\n";

	return $table_row;
}

function generate_image_from_hex($name, $hex, $width, $height)
{
	$path = "../images/" . image_filename($name);

	$dec = hexdec($hex);
	
	$red_255 = 0xFF & $dec >> 0x10;
	$green_255 = 0xFF & $dec >> 0x8;
	$blue_255 = 0xFF & $dec;

	$image = imagecreatetruecolor($width, $height);

	$background_color = imagecolorallocate($image, $red_255, $green_255, $blue_255);

	imagefilledrectangle($image, 0, 0, $width, $height, $background_color);

	imagepng($image, $path);
}

function image_filename($name)
{
	return str_replace(" ", "", ucwords($name)) . ".png";
}

$colors = array("efdecd" => "Almond",
"cd9575" => "Antique Brass",
"fdd9b5" => "Apricot",
"78dbe2" => "Aquamarine",
"87a96b" => "Asparagus",
"ffa474" => "Atomic Tangerine",
"fae7b5" => "Banana Mania",
"9f8170" => "Beaver",
"fd7c6e" => "Bittersweet",
"000" => "Black",
"ace5ee" => "Blizzard Blue",
"1f75fe" => "Blue",
"a2a2d0" => "Blue Bell",
"69c" => "Blue Gray",
"0d98ba" => "Blue Green",
"7366bd" => "Blue Violet",
"de5d83" => "Blush",
"cb4154" => "Brick Red",
"b4674d" => "Brown",
"ff7f49" => "Burnt Orange",
"ea7e5d" => "Burnt Sienna",
"b0b7c6" => "Cadet Blue",
"ff9" => "Canary",
"1cd3a2" => "Caribbean Green",
"fac" => "Carnation Pink",
"dd4492" => "Cerise",
"1dacd6" => "Cerulean",
"bc5d58" => "Chestnut",
"dd9475" => "Copper",
"9aceeb" => "Cornflower",
"ffbcd9" => "Cotton Candy",
"fddb6d" => "Dandelion",
"2b6cc4" => "Denim",
"efcdb8" => "Desert Sand",
"6e5160" => "Eggplant",
"ceff1d" => "Electric Lime",
"71bc78" => "Fern",
"6dae81" => "Forest Green",
"c364c5" => "Fuchsia",
"c66" => "Fuzzy Wuzzy",
"e7c697" => "Gold",
"fcd975" => "Goldenrod",
"a8e4a0" => "Granny Smith Apple",
"95918c" => "Gray",
"1cac78" => "Green",
"1164b4" => "Green Blue",
"f0e891" => "Green Yellow",
"ff1dce" => "Hot Magenta",
"b2ec5d" => "Inchworm",
"5d76cb" => "Indigo",
"ca3767" => "Jazzberry Jam",
"3bb08f" => "Jungle Green",
"fefe22" => "Laser Lemon",
"fcb4d5" => "Lavender",
"fff44f" => "Lemon Yellow",
"ffbd88" => "Macaroni Cheese",
"f664af" => "Magenta",
"aaf0d1" => "Magic Mint",
"cd4a4c" => "Mahogany",
"edd19c" => "Maize",
"979aaa" => "Manatee",
"ff8243" => "Mango Tango",
"c8385a" => "Maroon",
"ef98aa" => "Mauvelous",
"fdbcb4" => "Melon",
"1a4876" => "Midnight Blue",
"30ba8f" => "Mountain Meadow",
"c54b8c" => "Mulberry",
"1974d2" => "Navy Blue",
"ffa343" => "Neon Carrot",
"bab86c" => "Olive Green",
"ff7538" => "Orange",
"ff2b2b" => "Orange Red",
"f8d568" => "Orange Yellow",
"e6a8d7" => "Orchid",
"414a4c" => "Outer Space",
"ff6e4a" => "Outrageous Orange",
"1ca9c9" => "Pacific Blue",
"ffcfab" => "Peach",
"c5d0e6" => "Periwinkle",
"fddde6" => "Piggy Pink",
"158078" => "Pine Green",
"fc74fd" => "Pink Flamingo",
"f78fa7" => "Pink Sherbert",
"8e4585" => "Plum",
"7442c8" => "Purple Heart",
"9d81ba" => "Purple Mountains Majesty",
"fe4eda" => "Purple Pizzazz",
"ff496c" => "Radical Red",
"d68a59" => "Raw Sienna",
"714b23" => "Raw Umber",
"ff48d0" => "Razzle Dazzle Rose",
"e3256b" => "Razzmatazz",
"ee204d" => "Red",
"ff5349" => "Red Orange",
"c0448f" => "Red Violet",
"1fcecb" => "Robins Egg Blue",
"7851a9" => "Royal Purple",
"ff9baa" => "Salmon",
"fc2847" => "Scarlet",
"76ff7a" => "Screamin Green",
"9fe2bf" => "Sea Green",
"a5694f" => "Sepia",
"8a795d" => "Shadow",
"45cea2" => "Shamrock",
"fb7efd" => "Shocking Pink",
"cdc5c2" => "Silver",
"80daeb" => "Sky Blue",
"eceabe" => "Spring Green",
"ffcf48" => "Sunglow",
"fd5e53" => "Sunset Orange",
"faa76c" => "Tan",
"18a7b5" => "Teal Blue",
"ebc7df" => "Thistle",
"fc89ac" => "Tickle Me Pink",
"dbd7d2" => "Timberwolf",
"17806d" => "Tropical Rain Forest",
"deaa88" => "Tumbleweed",
"77dde7" => "Turquoise Blue",
"ff6" => "Unmellow Yellow",
"926eae" => "Violet Purple",
"324ab2" => "Violet Blue",
"f75394" => "Violet Red",
"ffa089" => "Vivid Tangerine",
"8f509d" => "Vivid Violet",
"FFFFFF" => "White",
"a2add0" => "Wild Blue Yonder",
"ff43a4" => "Wild Strawberry",
"fc6c85" => "Wild Watermelon",
"cda4de" => "Wisteria",
"fce883" => "Yellow",
"c5e384" => "Yellow Green",
"ffb653" => "Yellow Orange",
"c39953" => "Aztec Gold",
"a17a74" => "Burnished Brown",
"6d9bc3" => "Cerulean Frost",
"cd607e" => "Cinnamon Satin",
"ad6f69" => "Copper Penny",
"2e2d88" => "Cosmic Cobalt",
"ab92b3" => "Glossy Grape",
"676767" => "Granite Gray",
"6eaea1" => "Green Sheen",
"ae98aa" => "Lilac Luster",
"bbb477" => "Misty Moss",
"ad4379" => "Mystic Maroon",
"b768a2" => "Pearly Purple",
"8ba8b7" => "Pewter Blue",
"5da493" => "Polished Pine",
"a6a6a6" => "Quick Silver",
"9e5e6f" => "Rose Dust",
"da2c43" => "Rusty Red",
"778ba5" => "Shadow Blue",
"5fa778" => "Shiny Shamrock",
"5f8a8b" => "Steel Teal",
"914e75" => "Sugar Plum",
"8a496b" => "Twilight Lavender",
"56887d" => "Wintergreen Dream",
"fefefa" => "Baby Powder",
"ffd12a" => "Banana",
"4f86f7" => "Blueberry",
"ffd3f8" => "Bubble Gum",
"c95a49" => "Cedar Chest",
"da2647" => "Cherry",
"bd8260" => "Chocolate",
"fefefe" => "Coconut",
"ffff31" => "Daffodil",
"9b7653" => "Dirt",
"44d7a8" => "Eucalyptus",
"a6e7ff" => "Fresh Air",
"6f2da8" => "Grape",
"da614e" => "Jelly Bean",
"253529" => "Leather Jacket",
"ffff38" => "Lemon",
"1a1110" => "Licorice",
"db91ef" => "Lilac",
"b2f302" => "Lime",
"ffe4cd" => "Lumber",
"214fc6" => "New Car",
"45a27d" => "Pine",
"ff5050" => "Rose",
"ffcff1" => "Shampoo",
"738276" => "Smoke",
"cec8ef" => "Soap",
"fc5a8d" => "Strawberry",
"ff878d" => "Tulip",
"64609A" => "Amethyst",
"933709" => "Citrine",
"14A989" => "Emerald",
"469A84" => "Jade",
"D05340" => "Jasper",
"436CB9" => "Lapis Lazuli",
"469496" => "Malachite",
"3AA8C1" => "Moonstone",
"353839" => "Onyx",
"ABAD48" => "Peridot",
"B07080" => "Pink Pearl",
"BD559C" => "Rose Quartz",
"AA4069" => "Ruby",
"2D5DA1" => "Sapphire",
"832A0D" => "Smokey Topaz",
"B56917" => "Tigers Eye",
"5fbed7" => "Aqua Pearl",
"54626f" => "Black Coral Pearl",
"6ada8e" => "Caribbean Green Pearl",
"f5f5f5" => "Cultured Pearl",
"e8f48c" => "Key Lime Pearl",
"f37a48" => "Mandarin Pearl",
"702670" => "Midnight Pearl",
"d65282" => "Mystic Pearl",
"4f42b5" => "Ocean Blue Pearl",
"48bf91" => "Ocean Green Pearl",
"7b4259" => "Orchid Pearl",
"f03865" => "Rose Pearl",
"f1444a" => "Salmon Pearl",
"f2f27a" => "Sunny Pearl",
"f1cc79" => "Sunset Pearl",
"3bbcd0" => "Turquoise Pearl",
"c46210" => "Alloy Orange",
"2e5894" => "Bdazzled Blue",
"9c2542" => "Big Dip O Ruby",
"bf4f51" => "Bittersweet Shimmer",
"a57164" => "Blast Off Bronze",
"58427c" => "Cyber Grape",
"4a646c" => "Deep Space Sparkle",
"85754e" => "Gold Fusion",
"319177" => "Illuminating Emerald",
"0a7e8c" => "Metallic Seaweed",
"9c7c38" => "Metallic Sunburst",
"8d4e85" => "Razzmic Berry",
"8fd400" => "Sheen Green",
"d98695" => "Shimmering Blush",
"757575" => "Sonic Silver",
"0081ab" => "Steel Blue",
"84de02" => "Alien Armpit",
"e88e5a" => "Big Foot Feet",
"dde26a" => "Booger Buster",
"c53151" => "Dingy Dungeon",
"ffdf46" => "Gargoyle Gas",
"b05c52" => "Giants Club",
"f46" => "Magic Potion",
"828e84" => "Mummys Tomb",
"fd5240" => "Ogre Odor",
"391285" => "Pixie Powder",
"ff85cf" => "Princess Perfume",
"ff4681" => "Sasquatch Socks",
"4bc7cf" => "Sea Serpent",
"ff6d3a" => "Smashed Pumpkin",
"ff404c" => "Sunburnt Cyclops",
"a0e6ff" => "Winter Wizard",
"ff3855" => "Sizzling Red",
"fd3a4a" => "Red Salsa",
"fb4d46" => "Tart Orange",
"fa5b3d" => "Orange Soda",
"ffaa1d" => "Bright Yellow",
"fff700" => "Yellow Sunshine",
"299617" => "Slimy Green",
"a7f432" => "Green Lizard",
"2243b6" => "Denim Blue",
"5dadec" => "Blue Jeans",
"5946b2" => "Plump Purple",
"9c51b6" => "Purple Plum",
"a83731" => "Sweet Brown",
"af6e4d" => "Brown Sugar",
"1b1b1b" => "Eerie Black",
"bfafb2" => "Black Shadows",
"ff5470" => "Fiery Rose",
"ffdb00" => "Sizzling Sunrise",
"ff7a00" => "Heat Wave",
"fdff00" => "Lemon Glacier",
"87ff2a" => "Spring Frost",
"0048ba" => "Absolute Zero",
"ff007c" => "Winter Sky",
"e936a7" => "Frostbite");

asort($colors);

?>