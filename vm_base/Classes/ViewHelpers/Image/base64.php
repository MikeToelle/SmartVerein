<?php

namespace Typo3graf\VmBase\ViewHelpers\Image;
/**
 * Example
 * {namespace m=TYPO3\ExtensionName\ViewHelpers}
 * <m:customName param="nicecontent"></m:customName>
 * Nice description ;-)
 *
 * @package TYPO3
 * @subpackage ExtensionName
 * @version
 */
use TYPO3\CMS\Core\Resource\Exception\ResourceDoesNotExistException;
use Typo3graf\VmBase\Domain\Model\FileReference;

class Base64ViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * @var string
     */
    protected $tagName = 'img';

    /**
     * @var \TYPO3\CMS\Extbase\Service\ImageService
     */
    protected $imageService;

    /**
     * @param \TYPO3\CMS\Extbase\Service\ImageService $imageService
     */
    public function injectImageService(\TYPO3\CMS\Extbase\Service\ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Initialize arguments.
     *
     * @return void
     */
    /*public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerUniversalTagAttributes();

        $this->registerTagAttribute('alt', 'string', 'Specifies an alternate text for an image', false);
        $this->registerTagAttribute('ismap', 'string', 'Specifies an image as a server-side image-map. Rarely used. Look at usemap instead', false);
        $this->registerTagAttribute('longdesc', 'string', 'Specifies the URL to a document that contains a long description of an image', false);
        $this->registerTagAttribute('usemap', 'string', 'Specifies an image as a client-side image-map', false);
    }
*/
    /**
     * Resizes a given image (if required) and renders the respective img tag
     *
     * @see https://docs.typo3.org/typo3cms/TyposcriptReference/ContentObjects/Image/
     * @param string $src a path to a file, a combined FAL identifier or an uid (int). If $treatIdAsReference is set, the integer is considered the uid of the sys_file_reference record. If you already got a FAL object, consider using the $image parameter instead
     * @param string $width width of the image. This can be a numeric value representing the fixed width of the image in pixels. But you can also perform simple calculations by adding "m" or "c" to the value. See imgResource.width for possible options.
     * @param string $height height of the image. This can be a numeric value representing the fixed height of the image in pixels. But you can also perform simple calculations by adding "m" or "c" to the value. See imgResource.width for possible options.
     * @param int $minWidth minimum width of the image
     * @param int $minHeight minimum height of the image
     * @param int $maxWidth maximum width of the image
     * @param int $maxHeight maximum height of the image
     * @param bool $treatIdAsReference given src argument is a sys_file_reference record
     * @param Typo3graf\VmBase\Domain\Model\FileReference $image a FAL object
     * @param string|bool $crop overrule cropping of image (setting to FALSE disables the cropping set in FileReference)
     * @param bool $absolute Force absolute URL
     * @param bool $conver Convert to base64
     *
     * @throws \TYPO3\CMS\Fluid\Core\ViewHelper\Exception
     * @return string Rendered tag
     */
    public function render($src = null, $width = null, $height = null, $minWidth = null, $minHeight = null, $maxWidth = null, $maxHeight = null, $treatIdAsReference = false, $image = null, $crop = null, $absolute = false, $convert=null)
    {
        if (is_null($src) && is_null($image) || !is_null($src) && !is_null($image)) {
            throw new \TYPO3\CMS\Fluid\Core\ViewHelper\Exception('You must either specify a string src or a File object.', 1382284106);
        }

        try {
            $image = $this->imageService->getImage($src, $image, $treatIdAsReference);
            if ($crop === null) {
                $crop = $image instanceof FileReference ? $image->getProperty('crop') : null;
            }
            $processingInstructions = array(
                'width' => $width,
                'height' => $height,
                'minWidth' => $minWidth,
                'minHeight' => $minHeight,
                'maxWidth' => $maxWidth,
                'maxHeight' => $maxHeight,
                'crop' => $crop,
            );
            $processedImage = $this->imageService->applyProcessingInstructions($image, $processingInstructions);
            $imageUri = $this->imageService->getImageUri($processedImage, $absolute);
            if($convert!=null){
                $root = explode("/",realpath($_SERVER['DOCUMENT_ROOT']));
                $path = substr(PATH_site, 0, -1).$imageUri;
                unset($root[count($root) - 1]);
                $root = implode("/", $root);
                $type = pathinfo($root.$imageUri, PATHINFO_EXTENSION);
                $data = file_get_contents($path);

                if($data!=''){
                    //$newImage = imagescale($data,50,50);
                    $imageData = 'data:image/' . $type . ';base64,' . base64_encode($data);
                }
            }

            //$this->tag->addAttribute('src', $imageUri);
            //$this->tag->addAttribute('width', $processedImage->getProperty('width'));
            //$this->tag->addAttribute('height', $processedImage->getProperty('height'));

            $alt = $image->getProperty('alternative');
            $title = $image->getProperty('title');

            // The alt-attribute is mandatory to have valid html-code, therefore add it even if it is empty
            if (empty($this->arguments['alt'])) {
               // $this->tag->addAttribute('alt', $alt);
            }
            if (empty($this->arguments['title']) && $title) {
               // $this->tag->addAttribute('title', $title);
            }
        } catch (ResourceDoesNotExistException $e) {
            // thrown if file does not exist
        } catch (\UnexpectedValueException $e) {
            // thrown if a file has been replaced with a folder
        } catch (\RuntimeException $e) {
            // RuntimeException thrown if a file is outside of a storage
        } catch (\InvalidArgumentException $e) {
            // thrown if file storage does not exist
        }

        return $imageData;
    }
}
