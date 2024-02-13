<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 *
 * @since 1.0.0
 */
class Elementor_Udc_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'udc';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve udc widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Pricing Card UDC', 'hz-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'udc', 'card', 'pricing card', 'custom' ];
	}

    // public function get_script_depends() {
	// 	return [ 'udc-card' ];
	// }


	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'General', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_html__( 'Heading', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'The Power Of <span>Suvae<span>', 'hz-widgets' ),
				'placeholder' => __( 'Type your description here', 'hz-widgets' ),
			]
		);

        $this->add_control(
			'sub_sub_heading',
			[
				'label' => esc_html__( 'Sub Title', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( "Securing and maintaining prime real estate on Amazon's first page is the key to success, here's how we help.", 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your title here', 'hz-widgets' ),
			]
		);

        $this->add_control(
			'sub_heading',
			[
				'label' => esc_html__( 'Sub Heading', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( "What's your monthly order volume?", 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your title here', 'hz-widgets' ),
			]
		);

        $this->add_control(
			'note',
			[
				'label' => esc_html__( 'Note', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( "Results reflect the total number of customer reviews you will receive after selling the specified number of units with vs without Suvae's Product Inserts.", 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your title here', 'hz-widgets' ),
			]
		);

        $this->add_control(
			'url_title',
			[
				'label' => esc_html__( 'URL Title', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Schedule Demo', 'hz-widgets' ),
				'placeholder' => esc_html__( 'Type your title here', 'hz-widgets' ),
			]
		);

        $this->add_control(
			'url_link',
			[
				'label' => esc_html__( 'URL Link', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

        $this->add_control(
			'suvae_logo',
			[
				'label' => esc_html__( 'Logo', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' =>    UDC_PLUGIN_ASSETS_FILE . '/images/suvae.png',
				],
			]
		);

        $this->add_control(
			'sad',
			[
				'label' => esc_html__( 'Sad Image', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => UDC_PLUGIN_ASSETS_FILE . '/images/sad.png',
				],
			]
		);

        $this->add_control(
			'happy',
			[
				'label' => esc_html__( 'Happy Image', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => UDC_PLUGIN_ASSETS_FILE . '/images/happy.png',
				],
			]
		);
	

		$this->end_controls_section();

        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'hz-widgets' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'hz-widgets' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'hz-widgets' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .udc_container h2' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .udc_container p' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .udc_container .note' => 'text-align: {{VALUE}};',


				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Heading', 'hz-widgets' ),
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .udc_container h2',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Sub Title', 'hz-widgets' ),
				'name' => 'subheading_sub_typography',
				'selector' => '{{WRAPPER}} .udc_container .p1',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Sub Heading', 'hz-widgets' ),
				'name' => 'subheading_typography',
				'selector' => '{{WRAPPER}} .udc_container .p2',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Notes', 'hz-widgets' ),
				'name' => 'note_typography',
				'selector' => '{{WRAPPER}} .udc_container .note',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Button', 'hz-widgets' ),
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .udc_container a.link',
			]
		);

        $this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Button Text Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .udc_container a.link' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Button Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .udc_container a.link' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'button_color_hover',
			[
				'label' => esc_html__( 'Button Text Color Hover', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .udc_container a.link:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'btn_bg_color_hover',
			[
				'label' => esc_html__( 'Button Color Hover', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .udc_container a.link:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'general_bg_color',
			[
				'label' => esc_html__( 'Container Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .udc_container' => 'background-color: {{VALUE}}',
				],
			]
		);


        $this->end_controls_section();
	}



	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();


        ?>
		<style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&display=swap');
			.udc_container{
                background: #08142DF2;
                padding: 32px;
                color: white;
                text-align: center;
            }

            .udc_container .result_cards {
                display: flex;
                justify-content: center;
                gap: 20px;
                margin-bottom: 25px;
            }

            .udc_container .result_cards .ico{
                height: 162px;
                object-fit: contain;
            }

            .udc_container .result_cards .ico_small{
                height: 57px;
                object-fit: contain;
            }

            .udc_container .card {
                background: linear-gradient(0deg, rgba(15, 60, 41, 0.4), rgba(15, 60, 41, 0.4));
                border: 1px solid #FFFFFF;
                box-shadow: 4px -20px 20px 0px #FFFFFF40 inset;
                padding: 20px;
                width: 310px;
                height: 392px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-between;
                border-radius: 20px;
            }

            .udc_container .title {
                font-family: 'Inter', sans-serif;
                font-size: 20px;
                font-weight: 600;
                line-height: 24px;
                letter-spacing: 0em;
                text-align: center;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .udc_container .card_without_suvae .title{
                margin: 15px 0 0 0;
            }

            .udc_container .range {
                font-family: 'Inter', sans-serif;
                font-size: 30px;
                font-weight: 700;
                line-height: 65px;
                letter-spacing: 0em;
                color: white;
            }

            .udc_container h2 {
                font-family: 'Inter', sans-serif;
                font-size: 55px;
                font-weight: 700;
                line-height: 80px;
                letter-spacing: 0em;
                text-align: center;
                color: white;
            }

            .udc_container h2 span{
                color: #315BE8;
            }

            .udc_container p {
                font-family: 'Inter', sans-serif;
                font-size: 30px;
                font-weight: 600;
                line-height: 36px;
                letter-spacing: 0em;
                margin-bottom: 80px;
                color: #FFFFFFCC;
            }

            .udc_container .p1 {
                font-size: 20px;
                font-weight: 400;
            }

            .udc_container .review {
                font-family: 'Inter', sans-serif;
                font-size: 17px;
                font-weight: 600;
                line-height: 24px;
                letter-spacing: 0em;
                text-align: center;
                color:white;
            }

            .udc_container .note {
                font-size: 20px;
                font-weight: 400;
                line-height: 36px;
                letter-spacing: 0em;
                text-align: center;
                font-family: 'Inter', sans-serif;
                padding-bottom: 45px;
                border-bottom: 1px solid #ffffff99;
                margin-bottom: 50px;
            }

            .udc_container a.link, .udc_container a.link:hover {
                background: white;
                padding: 20px 200px;
                display: inline-block;
                font-size: 22px;
                font-weight: 600;
                line-height: 30px;
                letter-spacing: 0em;
                text-align: left;
                color: #104CBA;
                font-family: 'Inter', sans-serif;
                border-radius: 8px;
                margin-bottom: 40px;
            }

            .udc_container .card.card_with_suvae.active {
                background: linear-gradient(189.61deg, #315BE8 3.23%, #1494FF 92.76%),
                linear-gradient(0deg, #FFFFFF, #FFFFFF);
            }


            .range_slider {
                width: 100%; /* Adjust width as needed */
                position: relative;
                margin-bottom: 70px;
            }

            .custom_slider {
                width: 100%;
                position: relative;
            }

            .slide {
                position: absolute;
                top: 10px;
                height: 12px;
                width: 100%;
                background-color: transparent;
                border-radius: 6px;
                border: 1px solid #104CBA;
            }

            .handle {
                position: absolute;
                top: -11px;
                left: 0;
                cursor: pointer;
                background: #104CBA;
                border: 2px solid white;
                width: 34px;
                height: 34px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
                z-index: 1;
            }

            .handle svg path{
                fill: white;
            }

            svg {
                width: 22px;
                height: 12px;
            }

            #vol_slider{
                width: 100%;
                position: relative;
                z-index: 2;
                cursor: pointer;
                padding: 20px 0 0;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-color: transparent;
                opacity: 0;
            }

            #vol_slider::-webkit-slider-thumb,
            #vol_slider::-moz-range-thumb,
            #vol_slider::-ms-thumb {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }



            .value_display {
                position: absolute;
                top: -52px;
                background: #104CBA;
                width: 75px;
                height: 36px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 8px;
            }

            .points {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .points span{
                cursor: pointer;
            }

            .points.nos{
                display: flex;
                flex-wrap: nowrap;
                justify-content: space-between;
                width: calc(100% + 41.4px);
                margin: -4px -16px;
            }

            .points.nos span:before{
                content: "";
                display: block;
                position: absolute;
                top: -31px;
                left: 50%;
                transform: translateX(-50%);
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background-color: white;
                border: 2px solid #edf4f2;
            }

            .points.nos span, .value_display{
                font-family: 'Inter', sans-serif;
                font-size: 20px;
                font-weight: 500;
                line-height: 24px;
                letter-spacing: 0em;
            }

            .points.nos span{
                color: #9699AC;
                position: relative;
            }

            .udc_container{
                user-select: none;
            }

            .udc_container .value_display::after {
                content: " ";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -8px;
                border-width: 8px;
                border-style: solid;
                border-color: #104CBA transparent transparent transparent;
            }

            .udc_container .container{
                max-width: 1100px;
                margin: auto;
            }

            .udc_container .fill{
                height: 100%;
                position: absolute;
                width: 0%;
                background: #315BE8;
                border-radius: 6px;
            }

            @media (max-width: 680px){
                .udc_container h2{
                    font-size: 35px;
                    line-height: 35px;
                }

                .udc_container p{
                    font-size: 18px;
                    line-height: 18px;  
                }

                .points.nos span, .value_display{
                    font-size: 16px;
                    line-height: 16px;  
                }

                .udc_container .result_cards{
                    flex-direction: column;
                    align-items: center;
                }

                .udc_container a.link{
                    padding: 10px 50px;
                    font-size: 18px;
                    line-height: 18px;
                }

                .udc_container .note{
                    font-size: 14px;
                    line-height: 30px;
                    margin-bottom: 25px;
                    padding-bottom: 25px;
                }

                .range_slider{
                    margin-bottom: 50px;
                }
            }
		</style>
        <div class="udc_container">
            <div class="container">
            <h2><?php echo $settings['heading']; ?></h2>
            <p class="p1"><?php echo $settings['sub_sub_heading']; ?></p>
            <p class="p2"><?php echo $settings['sub_heading']; ?></p>
            <div class="range_slider">
                <div class="custom_slider">
                    <input style="" id="vol_slider" type="range" min="1000" max="5000" step="50">
                    <div class="slide">
                        <div class="fill"></div>
                        <div class="handle">
                            <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.1983 5.70336L14.5 2.00502L16.145 0.348358L21.5 5.70336L16.145 11.0467L14.5 9.40169L18.1983 5.70336ZM3.80167 5.70336L7.5 9.40169L5.855 11.0584L0.5 5.70336L5.855 0.360025L7.5 2.00502L3.80167 5.70336Z" fill="white"/>
                            </svg>
                            <div class="value_display">1000</div>
                        </div>
                    </div>
                    <div class="points nos">
                        <span data-points="1000">1000</span>
                        <span data-points="2000">2000</span>
                        <span data-points="3000">3000</span>
                        <span data-points="4000">4000</span>
                        <span data-points="5000">5000+</span>
                    </div>
                </div>
            </div>
            <div class="result_cards">
                <div class="card card_with_suvae active">
                    <div class="title">
                        <span>With</span>
                        <img class="ico_small" src="<?php echo $settings['suvae_logo']['url']; ?>" alt="suvae logo">
                    </div>
                    <img class="ico" src="<?php echo $settings['happy']['url']; ?>" alt="happy">
                    <div class="reviewss">
                        <div class="range">
                            130-170
                        </div>
                        <div class="review">Customer Reviews</div>
                    </div>
                </div>
                <div class="card card_without_suvae">
                    <div class="title">
                        <span>Without Suvae</span>
                    </div>
                    <img class="ico" src="<?php echo $settings['sad']['url']; ?>" alt="happy">
                    <div class="reviewss">
                        <div class="range">
                            10-40
                        </div>
                        <div class="review">Customer Reviews</div>
                    </div>
                </div>
            </div>
            <div class="note" ><?php echo $settings['note']; ?></div>
            <?php
                if ( ! empty( $settings['url_link']['url'] ) ) {
                    $this->add_link_attributes( 'url_link', $settings['url_link'] );
                }
            ?>
            <a class="link" <?php echo $this->get_render_attribute_string( 'url_link' ); ?>><?php echo $settings['url_title']; ?></a>
            </div>
        </div>

        <?php  //   if ( \Elementor\Plugin::$instance->editor->is_edit_mode()) : ?>
			<script>
                function udcSlider(element) {
                    const values = parseInt(element.value);
                    const max_value = parseInt(element.getAttribute("max"));
                    const min_value = parseInt(element.getAttribute("min"));

                    const fullValue = Math.round((values - min_value) / (max_value - min_value) * 100);

                    element.parentElement.parentElement.querySelector(".value_display").textContent = values;
                    element.parentElement.parentElement.querySelector('.handle').style.left = `calc(${fullValue}% - 17px)`;
                    element.parentElement.parentElement.querySelector('.udc_container .fill').style.width = fullValue + '%';

                    // Update suvae value
                    const min_sua = Math.floor((6.5/100) * values);
                    const max_sua = Math.floor((8/100) * values);

                    const min_sua_out = Math.floor((0.5/100) * values);
                    const max_sua_out = Math.floor((2/100) * values);

                    element.parentElement.parentElement.parentElement.querySelector('.card_with_suvae .range').textContent = min_sua + '-' + max_sua;
                    element.parentElement.parentElement.parentElement.querySelector('.card_without_suvae .range').textContent = min_sua_out + '-' + max_sua_out;
                }

                const rangeInputsUdc = document.querySelectorAll(".custom_slider input");
                rangeInputsUdc.forEach(input => {
                    udcSlider(input);
                    input.addEventListener("input", function() {
                        udcSlider(this);
                    });
                });
            </script>
        <?php // endif; ?>
		<?php
	}

}