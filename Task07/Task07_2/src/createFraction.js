export function createFraction(numerator, denominator) {
    if (denominator === 0) {
        throw new Error("Знаменатель не может быть нулевым");
    }

    function gcd(a, b) {
        return b === 0 ? Math.abs(a) : gcd(b, a % b);
    }

    const sign = denominator < 0 ? -1 : 1;
    const d = gcd(numerator, denominator);
    this.numerator = sign * numerator / d;
    this.denominator = Math.abs(denominator) / d;
}

createFraction.prototype.getNumer = function() {
    return this.numerator;
};

createFraction.prototype.getDenom = function() {
    return this.denominator;
};

createFraction.prototype.add = function(frac) {
    const a = this.getNumer();
    const b = this.getDenom();
    const c = frac.getNumer();
    const d = frac.getDenom();
    return new createFraction(a * d + c * b, b * d);
};

createFraction.prototype.sub = function(frac) {
    const a = this.getNumer();
    const b = this.getDenom();
    const c = frac.getNumer();
    const d = frac.getDenom();
    return new createFraction(a * d - c * b, b * d);
};

createFraction.prototype.toString = function() {
    const n = this.getNumer();
    const d = this.getDenom();
    const whole = Math.trunc(n / d);
    const remainder = Math.abs(n % d);

    if (remainder === 0) return `${whole}`;

    if (Math.abs(n) < d) {
        return `${n}/${d}`;
    }

    return `${whole}'${remainder}/${d}`;
};
