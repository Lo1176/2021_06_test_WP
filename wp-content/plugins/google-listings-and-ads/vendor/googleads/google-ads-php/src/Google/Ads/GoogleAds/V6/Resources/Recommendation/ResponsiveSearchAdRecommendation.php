<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v6/resources/recommendation.proto

namespace Google\Ads\GoogleAds\V6\Resources\Recommendation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The add responsive search ad recommendation.
 *
 * Generated from protobuf message <code>google.ads.googleads.v6.resources.Recommendation.ResponsiveSearchAdRecommendation</code>
 */
class ResponsiveSearchAdRecommendation extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. Recommended ad.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v6.resources.Ad ad = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $ad = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V6\Resources\Ad $ad
     *           Output only. Recommended ad.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V6\Resources\Recommendation::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. Recommended ad.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v6.resources.Ad ad = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Ads\GoogleAds\V6\Resources\Ad
     */
    public function getAd()
    {
        return isset($this->ad) ? $this->ad : null;
    }

    public function hasAd()
    {
        return isset($this->ad);
    }

    public function clearAd()
    {
        unset($this->ad);
    }

    /**
     * Output only. Recommended ad.
     *
     * Generated from protobuf field <code>.google.ads.googleads.v6.resources.Ad ad = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Ads\GoogleAds\V6\Resources\Ad $var
     * @return $this
     */
    public function setAd($var)
    {
        GPBUtil::checkMessage($var, \Google\Ads\GoogleAds\V6\Resources\Ad::class);
        $this->ad = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResponsiveSearchAdRecommendation::class, \Google\Ads\GoogleAds\V6\Resources\Recommendation_ResponsiveSearchAdRecommendation::class);

