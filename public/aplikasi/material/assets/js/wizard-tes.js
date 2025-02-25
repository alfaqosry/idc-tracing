/**
 *  Form Wizard
 */

'use strict';

(function () {
  // Init custom option check
  window.Helpers.initCustomOptionCheck();

  const flatpickrRange = document.querySelector('.flatpickr'),
    phoneMask = document.querySelector('.contact-number-mask'),
    plCountry = $('#plCountry'),
    plFurnishingDetailsSuggestionEl = document.querySelector('#plFurnishingDetails');

  // Phone Number Input Mask
  if (phoneMask) {
    new Cleave(phoneMask, {
      phone: true,
      phoneRegionCode: 'US'
    });
  }

  // select2 (Country)

  if (plCountry) {
    select2Focus(plCountry);
    plCountry.wrap('<div class="position-relative"></div>');
    plCountry.select2({
      placeholder: 'Select country',
      dropdownParent: plCountry.parent()
    });
  }

  if (flatpickrRange) {
    flatpickrRange.flatpickr({
      minDate: 'today'
    });
  }

  // Tagify (Furnishing details)
  const furnishingList = [
    'Fridge',
    'TV',
    'AC',
    'WiFi',
    'RO',
    'Washing Machine',
    'Sofa',
    'Bed',
    'Dining Table',
    'Microwave',
    'Cupboard'
  ];
  if (plFurnishingDetailsSuggestionEl) {
    const plFurnishingDetailsSuggestion = new Tagify(plFurnishingDetailsSuggestionEl, {
      whitelist: furnishingList,
      maxTags: 10,
      dropdown: {
        maxItems: 20,
        classname: 'tags-inline',
        enabled: 0,
        closeOnSelect: false
      }
    });
  }

  // Vertical Wizard
  // --------------------------------------------------------------------

  const wizardPropertyListing = document.querySelector('#wizard-property-listing');
  if (typeof wizardPropertyListing !== undefined && wizardPropertyListing !== null) {
    // Wizard form
    const wizardPropertyListingForm = wizardPropertyListing.querySelector('#wizard-property-listing-form');
    // Wizard steps
    const wizardPropertyListingFormStep1 = wizardPropertyListingForm.querySelector('#beratdantinggibadan');
    const wizardPropertyListingFormStep2 = wizardPropertyListingForm.querySelector('#tekananguladandarah');
    const wizardPropertyListingFormStep3 = wizardPropertyListingForm.querySelector('#gayahidup');
    const wizardPropertyListingFormStep4 = wizardPropertyListingForm.querySelector('#property-keluarga');

    // Wizard next prev button
    const wizardPropertyListingNext = [].slice.call(wizardPropertyListingForm.querySelectorAll('.btn-next'));
    const wizardPropertyListingPrev = [].slice.call(wizardPropertyListingForm.querySelectorAll('.btn-prev'));

    const validationStepper = new Stepper(wizardPropertyListing, {
      linear: true
    });

    // Personal Details
    const FormValidation1 = FormValidation.formValidation(wizardPropertyListingFormStep1, {
      fields: {
        // * Validate the fields here based on your requirements
        tinggi_badan: {
          validators: {
            notEmpty: {
              message: 'Tinggi badan tidak boleh kosong'
            }
          }
        },

        berat_badan: {
          validators: {
            notEmpty: {
              message: 'Berat badan tidak boleh kosong'
            }
          }
        },


      },

      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-sm-6'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      },
      init: instance => {
        instance.on('plugins.message.placed', function (e) {
          //* Move the error message out of the `input-group` element
          if (e.element.parentElement.classList.contains('input-group')) {
            e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
          }
        });
      }
    }).on('core.form.valid', function () {
      // Jump to the next step when all fields in the current step are valid
      validationStepper.next();
    });

    // Property Details
    const FormValidation2 = FormValidation.formValidation(wizardPropertyListingFormStep2, {
      fields: {
        // * Validate the fields here based on your requirements

        tekanan_darah: {
          validators: {
            notEmpty: {
              message: 'Tekanan darah tidak boleh kosong'
            }
          }
        },
        kadar_gula: {
          validators: {
            notEmpty: {
              message: 'Kadar gula tidak boleh kosong'
            }
          }
        },
        
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: function (field, ele) {
            // field is the field name & ele is the field element
            switch (field) {
              case 'plAddress':
                return '.col-lg-12';
              default:
                return '.col-sm-6';
            }
          }
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      // Jump to the next step when all fields in the current step are valid
      validationStepper.next();
    });

    // select2 (Property type)
    const tinggi_badan = $('#tinggi_badan');
    if (tinggi_badan.length) {
      select2Focus(tinggi_badan);
      tinggi_badan.wrap('<div class="position-relative"></div>');
      tinggi_badan
        .select2({
          placeholder: 'Pilih',
          dropdownParent: tinggi_badan.parent()
        })
        .on('change', function () {
          // Revalidate the color field when an option is chosen
          FormValidation2.revalidateField('tinggi_badan');
        });
    }

   

    const berat_badan = $('#berat_badan');
    if (berat_badan.length) {
      select2Focus(berat_badan);
      berat_badan.wrap('<div class="position-relative"></div>');
      berat_badan
        .select2({
          placeholder: 'Pilih',
          dropdownParent: berat_badan.parent()
        })
        .on('change', function () {
          // Revalidate the color field when an option is chosen
          FormValidation2.revalidateField('berat_badan');
        });
    }

    const kosumsi_makanan = $('#kosumsi_makanan');
    if (kosumsi_makanan.length) {
      select2Focus(kosumsi_makanan);
      kosumsi_makanan.wrap('<div class="position-relative"></div>');
      kosumsi_makanan
        .select2({
          placeholder: 'Pilih',
          dropdownParent: kosumsi_makanan.parent()
        })
        .on('change', function () {
          // Revalidate the color field when an option is chosen
          FormValidation2.revalidateField('kosumsi_makanan');
        });
    }

    // Property Features
    const FormValidation3 = FormValidation.formValidation(wizardPropertyListingFormStep3, {
      fields: {
        aktifitas_fisik: {
          validators: {
            notEmpty: {
              message: 'Pertnyaan ini harus diisi'
            }
          }
        },
        kosumsi_makanan: {
          validators: {
            notEmpty: {
              message: 'Pertnyaan ini harus diisi'
            }
          }
        },
    

        tekanan: {
          validators: {
            notEmpty: {
              message: 'Pertnyaan ini harus diisi'
            }
          }
        },


      

      },

      
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-sm-6'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      validationStepper.next();
    });


    const FormValidation4 = FormValidation.formValidation(wizardPropertyListingFormStep4, {
      fields: {
        keluarga: {
          validators: {
            notEmpty: {
              message: 'Pertnyaan ini harus diisi'
            }
          }
        },
        merokok: {
          validators: {
            notEmpty: {
              message: 'Pertnyaan ini harus diisi'
            }
          }
        },
        merokok_fasif: {
          validators: {
            notEmpty: {
              message: 'Pertnyaan ini harus diisi'
            }
          }
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: '.col-sm-6'
        }),
        autoFocus: new FormValidation.plugins.AutoFocus(),
        submitButton: new FormValidation.plugins.SubmitButton()
      }
    }).on('core.form.valid', function () {
      validationStepper.next();
    });





    const aktifitasFisik = $('#aktifitas_fisik');
    if (aktifitasFisik.length) {
      select2Focus(aktifitasFisik);
      aktifitasFisik.wrap('<div class="position-relative"></div>');
      aktifitasFisik
        .select2({
          placeholder: 'Pilih',
          dropdownParent: aktifitasFisik.parent()
        })
        .on('change', function () {
          // Revalidate the color field when an option is chosen
          FormValidation3.revalidateField('selectKeluarga');
        });
    }

      const selectKeluarga = $('#selectKeluarga');
      if (selectKeluarga.length) {
        select2Focus(selectKeluarga);
        selectKeluarga.wrap('<div class="position-relative"></div>');
        selectKeluarga
          .select2({
            placeholder: 'Pilih',
            dropdownParent: selectKeluarga.parent()
          })
          .on('change', function () {
            // Revalidate the color field when an option is chosen
            FormValidation4.revalidateField('selectKeluarga');
          });
      }

    // Property Area

    wizardPropertyListingNext.forEach(item => {
      item.addEventListener('click', event => {
        // When click the Next button, we will validate the current step
        switch (validationStepper._currentIndex) {
          case 0:
            FormValidation1.validate();
            break;

          case 1:
            FormValidation2.validate();
            break;

          case 2:
            FormValidation3.validate();
            break;

          case 3:
            FormValidation4.validate();
            break;

          case 4:
            FormValidation5.validate();
            break;

          default:
            break;
        }
      });
    });

    wizardPropertyListingPrev.forEach(item => {
      item.addEventListener('click', event => {
        switch (validationStepper._currentIndex) {
          case 4:
            validationStepper.previous();
            break;

          case 3:
            validationStepper.previous();
            break;

          case 2:
            validationStepper.previous();
            break;

          case 1:
            validationStepper.previous();
            break;

          case 0:

          default:
            break;
        }
      });
    });
  }
})();
