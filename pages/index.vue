<template>
    <div class="container">
        <div class="top">
            <p>理工学科 電気エネルギー・電子工学プログラム<br />電子デバイス工学</p>
            <p>ようこそ、大野研究室へ。</p>
            <p>ナノエレクトロニクスデバイスの設計、試作、評価を行っています。</p>
            <p>「見学」「研究相談」「共同研究」「試料の試作」などございましたらお気軽にご連絡ください。</p>
        </div>

        <div class="section">
            <div class="section-title">
                <h2>Researches</h2>
                <p>最新の研究&業績</p>
            </div>

            <div class="section-content">
                <div class="paper-img">
                    <NuxtImg src="/img/paper/Nanotechnology.webp" alt="paper" />
                </div>
                <div class="paper-container flex">
                    <div class="paper">
                        <div class="paper-title">
                            <a href="https://iopscience.iop.org/article/10.1088/1361-6528/ab7fcf" target="_blank" rel="noopener noreferrer">Neutral oxygen irradiation enhanced forming-less ZnO-based transparent analog memristor devices for neuromorphic computing applications</a>
                        </div>
                        <div class="paper-author">Firman Mangasa Simanjuntak, Takeo Ohno, Sridhar Chandrasekaran, Tseung-Yuen Tseng and Seiji Samukawa</div>
                        <div class="paper-publish">Nanotechnology 31, 26LT01 (2020).</div>
                    </div>
                    <div class="paper-content">酸素ビームを照射することで膜質が向上したZnO薄膜を持つ全透明アナログメモリスタ素子を試作した結果、未照射の素子と比較して繰り返しスイッチング回数が20倍に増加し、動作電流が10分の1に低減しました。また、この素子を用いてシナプス動作を再現し、その結果を用いて画像認識における精度向上に関する知見を得ました。</div>
                    <div>
                        <MoreButton text="Researches" link="/researches"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">
                <h2>Equipments</h2>
                <p>研究設備</p>
            </div>

            <div class="equi-section flex">
                <EquipmentsCard
                title="ナノ薄膜を形成するための真空装置"
                content="マスク交換システムおよびプラズマ源付き電子ビーム薄膜蒸着装置で、試料を大気中に一度も暴露させずに（＝汚れない）パターニングされたデバイスを作製可能です。"
                imageSrc="/img/equi/zu1/1-1.webp"
                />

                <EquipmentsCard
                title="fAオーダーまで測定可能な電気計測装置"
                content="半導体の電気計測装置としては最も高性能な製品を用いています。2台保有しています。"
                imageSrc="/img/equi/zu2/zu2-1.webp"
                />
            </div>
            <div class="more">
                <MoreButton text="Equipments" link="/equipments"/>
            </div>
        </div>

        <div class="section">
            <div class="section-title">
                <h2>Activities</h2>
                <p>活動実績</p>
            </div>
        </div>

        <div class="section">
            <div class="section-title">
                <h2>Member</h2>
                <p>メンバー</p>
            </div>

            <div class="member-section">
                <p class="blue-title">指導教員</p>
                <div class="member-content">
                    <p>准教授 / Associate Professor, PI</p>
                    <p class="professor">大野 武雄　博士（工学） / Takeo Ohno, PhD in Materials Science</p>
                    <p>大分大学理工学部理工学科電気エネルギー・電子工学プログラム
                        （兼）大分大学大学院工学研究科工学選考電気電子工学コース</p>
                </div>
                <p class="member-content-en">Electrical Power and Electronics Program, Department of Science and Technology, Faculty of Science and Technology, Oita University (concurrently) Division of Electrical and Electronic Engineering, Department of Engineering, Graduate School of Engineering, Oita University</p>
            </div>

            <div class="more">
                <MoreButton text="Member" link="/members"/>
            </div>
        </div>

        <div class="section">
            <div class="section-title">
                <h2>Room</h2>
                <p>研究室の様子</p>
            </div>

            <div class="room-section">
                <p class="blue-title">みなさんの生活環境にも気を遣っています</p>
                <div class="room-img"><NuxtImg src="/img/room/room01.webp"/></div>
            </div>

            <div class="more">
                <MoreButton text="Room" link="/room"/>
            </div>
        </div>

        <div class="section">
            <div class="section-title">
                <h2>Access</h2>
                <p>アクセス</p>
            </div>

            <div class="access-section">
                <p class="blue-title">研究室へのアクセス</p>
                <div class="map-img"><NuxtImg src="/img/access/map.webp"/></div>
                <div class="access-content">
                    <p>大分大学旦野原キャンパスの理工13号館（30番）2階にあります。お気軽にご訪問ください。</p>
                    <div class="access-room">
                        <p>准教授室：207号室</p>
                        <p>技 官 室：205号室</p>
                    </div>
                </div>
            </div>

            <div class="more">
                <MoreButton text="Room" link="/room"/>
            </div>
        </div>

    </div>
</template>