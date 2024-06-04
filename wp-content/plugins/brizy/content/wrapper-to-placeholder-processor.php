<?php

use BrizyPlaceholders\Extractor;
use BrizyPlaceholders\Replacer;

class Brizy_Content_WrapperToPlaceholderProcessor implements Brizy_Editor_Content_ProcessorInterface {
    /**
     * @param string $content
     * @param Brizy_Content_Context $context
     *
     * @return mixed|string
     */
    public function process( $content, Brizy_Content_Context $context ) {

		$placeholderProvider = new Brizy_Content_WrapperPlaceholderProvider( $context );
		$extractor           = new Extractor( $placeholderProvider );

		$context->setProvider( $placeholderProvider );

		list( $contentPlaceholders, $placeholderInstances, $content ) = $extractor->extract( $content );

		$replacer = new Replacer( $placeholderProvider );

		$content = $replacer->replaceWithExtractedData( $contentPlaceholders, $placeholderInstances, $content, $context );

		return $content;

    }
}