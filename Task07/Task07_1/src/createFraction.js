export function createFraction(numerator, denominator) {
    function gcd(a, b) {
        return b === 0 ? Math.abs(a) : gcd(b, a % b);
    }

    function normalize(num, denom) {
        if (denom === 0) throw new Error("Знаменатель не может быть нулевым");

        const sign = denom < 0 ? -1 : 1;
        const d = gcd(num, denom);
        return [sign * num / d, Math.abs(denom) / d];
    }

    let [normNum, normDen] = normalize(numerator, denominator);

    return {
        getNumer: () => normNum,
        getDenom: () => normDen,

        add: function (frac) {
            const a = this.getNumer(), b = this.getDenom();
            const c = frac.getNumer(), d = frac.getDenom();
            return createFraction(a * d + c * b, b * d);
        },

        sub: function (frac) {
            const a = this.getNumer(), b = this.getDenom();
            const c = frac.getNumer(), d = frac.getDenom();
            return createFraction(a * d - c * b, b * d);
        },

        toString: function () {
            const n = this.getNumer();
            const d = this.getDenom();
            const whole = Math.trunc(n / d);
            const remainder = Math.abs(n % d);

            if (remainder === 0) return `${whole}`;

            if (Math.abs(n) < d) {
                return `${n}/${d}`;
            }

            return `${whole}'${remainder}/${d}`;
        }
    };
}
