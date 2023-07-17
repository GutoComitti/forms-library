# Form library

This is a library for creating forms with inputs. It was made as an assignment from TMG, and the references regarding what is expected from the library are in the AssignmentReferences folder with detailed instructions [in this file](AssignmentReferences/Instructions.txt).

## Running the library

To insert this library you can insert this library into your project, and use the Sample.php file as a reference as to how you can use it. You can also use it as a standalone browser application, running the Sample.php file in an Apache server, XAMPP for example. Since it doesn't use any database, you can just start the Apache server with this library in the htdocs folder and access it from there.

## Extending and validations:

To add different validations, the library user can create custom classes that extend the desired type of input and pass it as a parameter. Something like CustomTextInput extends TextInput and then add a new CustomTextInput to the form. This way you can overwrite the validation method or even the display method.

# Notes for the assessment team:

These are notes for the team regarding decisions and things that wouldn't be on the documentation for the library user.

## Errors and exceptions:

At some points of the application that could have errors due to the inputs from the application that uses the library, I've thrown some InvalidArgumentException so that they can handle the exception the way they want to.

## Styling:

Another thing I thought about implementing was different FormRenderer classes. It's possible to make it so that the user could instantiate the Form passing the type of frontend styling (vanilla, bootstrap, tailwind, etc). I'm not sure it would be wanted as a feature, since it shouldn't matter that much for the users. If it would be used as an open source library or something for a variety of applications it would be nice to have. Then I decided to go with vanilla CSS, since it doesn't depend on any styling library being loaded previously and it can be included into basically any application. I also decided to make inline styling instead of having a css just so we don't have to load a css file in a part of the application that maybe wasn't ideal. Since it's for other people's use, it could be loaded in awkward places. Also this way, I ensure the styling won't cause collateral effects in the other parts of the parent application that uses it.

## Rendering:

I separated the rendering logic from the Form itself, to make it a separate concern to be tackled at the FormRenderer class.
Also with the way I structured things, it didn't seem necessary for me to have the _renderSetting function in the Inputs, only the render was enough to handle the displaying of the input. So I made the render function abstract, since every input would have different ways of displaying and excluded the _renderSetting abstract function. I also created the Input folder, since there might be a lot of different input options later on and it would be better organized.

## Autoload

I've added an autoload file to be able to import the classes dynamically instead of calling a lot of includes. The autoload expects the standard of having namespaces as the folders structure and class names with the same name as the file.

## Additional features:

To make it as easy to use for the Sample to work there wasn't necessary any extra features for customization. But it would be nice in case the application grows and more customization is expected, to have a class that would hold personalization settings for the user. That could to set different styling libraries to render the css (as mentioned before, to choose from vanilla, bootstrap, etc.), the URL for the form, maybe to change the color schema, or different types of styling.