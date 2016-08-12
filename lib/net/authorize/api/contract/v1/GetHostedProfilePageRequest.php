<?php

namespace net\authorize\api\contract\v1;

/**
 * Class representing GetHostedProfilePageRequest
 */
class GetHostedProfilePageRequest extends ANetApiRequestType
{

    /**
     * @property string $customerProfileId
     */
    private $customerProfileId = null;

    /**
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @property \net\authorize\api\contract\v1\SettingType[] $hostedProfileSettings
     */
    private $hostedProfileSettings = null;

    /**
     * Gets as customerProfileId
     *
     * @return string
     */
    public function getCustomerProfileId()
    {
        return $this->customerProfileId;
    }

    /**
     * Sets a new customerProfileId
     *
     * @param string $customerProfileId
     * @return self
     */
    public function setCustomerProfileId($customerProfileId)
    {
        $this->customerProfileId = $customerProfileId;
        return $this;
    }

    /**
     * Adds as setting
     *
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @return self
     * @param \net\authorize\api\contract\v1\SettingType $setting
     */
    public function addToHostedProfileSettings(\net\authorize\api\contract\v1\SettingType $setting)
    {
        $this->hostedProfileSettings[] = $setting;
        return $this;
    }

    /**
     * isset hostedProfileSettings
     *
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @param scalar $index
     * @return boolean
     */
    public function issetHostedProfileSettings($index)
    {
        return isset($this->hostedProfileSettings[$index]);
    }

    /**
     * unset hostedProfileSettings
     *
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @param scalar $index
     * @return void
     */
    public function unsetHostedProfileSettings($index)
    {
        unset($this->hostedProfileSettings[$index]);
    }

    /**
     * Gets as hostedProfileSettings
     *
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @return \net\authorize\api\contract\v1\SettingType[]
     */
    public function getHostedProfileSettings()
    {
        return $this->hostedProfileSettings;
    }

    /**
     * Sets a new hostedProfileSettings
     *
     * Allowed values for settingName are: hostedProfileReturnUrl,
     * hostedProfileReturnUrlText, hostedProfilePageBorderVisible,
     * hostedProfileIFrameCommunicatorUrl, hostedProfileHeadingBgColor,
     * hostedProfileBillingAddressRequired, hostedProfileCardCodeRequired,
     * hostedProfileBillingAddressOptions, hostedProfileManageOptions.
     *
     * @param \net\authorize\api\contract\v1\SettingType[] $hostedProfileSettings
     * @return self
     */
    public function setHostedProfileSettings(array $hostedProfileSettings)
    {
        $this->hostedProfileSettings = $hostedProfileSettings;
        return $this;
    }


}

